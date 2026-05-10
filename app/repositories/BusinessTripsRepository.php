<?php

namespace App\repositories;

use App\Models\BusinessTrips;
use App\repositories\interfaces\BusinessTripsRepositoryInterface;

class BusinessTripsRepository implements BusinessTripsRepositoryInterface {
    public function getByEmployeeId(int $id)
    {
        return BusinessTrips::where('employee_id', $id)->get();
    }

    public function create(array $data)
    {
        return BusinessTrips::create($data);
    }

    public function approvalRequest()
    {
        return BusinessTrips::where('status', 'PENDING')->orderBy('created_at', 'desc')->get();
    }

    public function approval(int $id, string $status)
    {
        $bussinesTrip = BusinessTrips::find($id);
        $bussinesTrip->status = $status;
        $bussinesTrip->save();
    }

    public function approvalHistory()
    {
        return BusinessTrips::whereNot('status', 'PENDING')->orderBy('created_at', 'desc')->get();
    }

    public function relationCheck(int $originCityId, int $destionationCityId)
    {
        return BusinessTrips::where('origin_city_id', $originCityId)
                ->orWhere('destination_city_id', $destionationCityId)
                ->exists();
            
    }
}