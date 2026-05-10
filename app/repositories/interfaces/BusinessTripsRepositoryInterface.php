<?php

namespace App\repositories\interfaces;


interface BusinessTripsRepositoryInterface {
    public function getByEmployeeId(int $id);
    public function create(array $data);
    public function approvalRequest();
    public function approval(int $id, string $status);
    public function approvalHistory();
    public function relationCheck(int $originCityId, int $destinationCityId);
}