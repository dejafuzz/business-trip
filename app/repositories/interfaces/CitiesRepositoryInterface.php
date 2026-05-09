<?php

namespace App\repositories\interfaces;

use Illuminate\Http\Request;

interface CitiesRepositoryInterface {
    public function getAll();
    public function create(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
    public function findById(int $id);
}