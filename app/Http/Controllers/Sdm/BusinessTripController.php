<?php

namespace App\Http\Controllers\Sdm;

use App\Http\Controllers\Controller;
use App\repositories\interfaces\BusinessTripsRepositoryInterface;
use Illuminate\Http\Request;

class BusinessTripController extends Controller
{
    protected BusinessTripsRepositoryInterface $businessTripRepository;

    public function __construct
    (
        BusinessTripsRepositoryInterface $bsuinessTripRepository
    )
    {
        $this->businessTripRepository = $bsuinessTripRepository;
    }

    public function index() {

        $businessTrips = $this->businessTripRepository->getAll();

        return view('sdm.businesstrips.index', compact('businessTrips'));
    }

    public function approval(Request $request, int $id) {

        try {

            $this->businessTripRepository->approval($id, $request->input('status'));

            return redirect()->back()->with('success', 'Perjalanan dinas berhasil disetujui.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat Approval.');
        }
    } 
}