<?php

namespace App\repositories\interfaces;


interface BusinessTripsRepositoryInterface {
    public function getByEmployeeId(int $id);
    public function create(array $data);
}