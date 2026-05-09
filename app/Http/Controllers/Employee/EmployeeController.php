<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\repositories\interfaces\BusinessTripsRepositoryInterface;
use App\repositories\interfaces\CitiesRepositoryInterface;
use App\validations\BusinessTripValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    protected BusinessTripsRepositoryInterface $businessTripsRepository;
    protected CitiesRepositoryInterface $citiesRepository;

    public function __construct
    (
        BusinessTripsRepositoryInterface $businessTripsRepository,
        CitiesRepositoryInterface $citiesRepository
    )
    {
        $this->businessTripsRepository = $businessTripsRepository;
        $this->citiesRepository = $citiesRepository;
    }

    public function businessTrips() {

        $businessTrips = $this->businessTripsRepository->getByEmployeeId(Auth::id());
        
        $cities = $this->citiesRepository->getAll();

        return view('employee.businesstrips.index', compact('businessTrips', 'cities'));
    }

    public function createBusinessTrips(Request $request) {
        
        $validator = Validator::make($request->all(), BusinessTripValidation::rules(), BusinessTripValidation::messages());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $originCity = $this->citiesRepository->findById($request->origin_city_id);

            $destinationCity = $this->citiesRepository->findById($request->destination_city_id);

            // calculate duration
            $departureDate = Carbon::parse($request->departure_date);

            $returnDate = Carbon::parse($request->return_date);

            $durationDays = $departureDate->diffInDays($returnDate) + 1;

            // calculate distance
            $distanceKm = $this->calculateDistance(
                $originCity->latitude,
                $originCity->longitude,
                $destinationCity->latitude,
                $destinationCity->longitude
            );

            // calculate daily allowence
            $dailyAllowence = 0;
            $currency = 'IDR';

            if ($destinationCity->is_foreign) {
                
                $dailyAllowence = 50;
                $currency = 'USD';

            } else {

                if ($distanceKm <= 60) {
                    
                    $dailyAllowence = 0;

                } elseif ($originCity->province == $destinationCity->province) {

                    $dailyAllowence = 200000;
                    
                } elseif ($originCity->island == $destinationCity->island) {

                    $dailyAllowence = 250000;
                    
                } else {

                    $dailyAllowence = 300000;
                    
                }
            }

            // total allowence
            $totalAllowence = $dailyAllowence * $durationDays;

            // save
            $this->businessTripsRepository->create([
                'employee_id' => Auth::id(),

                'origin_city_id' => $originCity->id,
                'destination_city_id' => $destinationCity->id,

                'purpose' => $request->purpose,

                'departure_date' => $request->departure_date,
                'return_date' => $request->return_date,

                'duration_days' => $durationDays,
                'distance_km' => $distanceKm,
                'daily_allowence' => $dailyAllowence,
                'currency' => $currency,
                'total_allowence' => $totalAllowence,
                
                'status' => 'PENDING',
            ]);

            return redirect()->back()->with('success', 'Pengajuan perdin berhasil dibuat.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan pengajuan perdin.');
        }
    }

    private function calculateDistance(
        float $latitudeFrom,
        float $longitudeFrom,
        float $latitudeTo,
        float $longitudeTo
    ) {

        $earthRadius = 6371;

        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);

        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(
            sqrt(
                pow(sin($latDelta / 2), 2) +
                cos($latFrom) *
                cos($latTo) *
                pow(sin($lonDelta / 2), 2)
            )
        );

        return round(
            $angle * $earthRadius,
            2
        );
    }
}