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

    public function getAll()
    {
        return BusinessTrips::all();
    }

    public function approval(int $id, string $status)
    {
        $bussinesTrip = BusinessTrips::find($id);
        $bussinesTrip->status = $status;
        $bussinesTrip->save();
    }
}