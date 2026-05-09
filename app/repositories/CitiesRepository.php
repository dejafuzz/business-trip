<?php

namespace App\repositories;

use App\Models\Cities;
use App\repositories\interfaces\CitiesRepositoryInterface;

class CitiesRepository implements CitiesRepositoryInterface {
    public function getAll() {
        return Cities::orderBy('created_at', 'desc')->get();
    }

    public function create(array $data): Cities {
        return Cities::create([
            'name' => $data['name'],
            'province' => $data['province'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'island' => $data['island'],
            'is_foreign' => $data['is_foreign']
        ]);
    }

    public function update(array $data, int $id) {
        $cities = Cities::findOrFail($id)
            ->update([
                'name' => $data['name'],
                'province' => $data['province'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'island' => $data['island'],
                'is_foreign' => $data['is_foreign']
            ]);
    }

    public function delete(int $id) {
        Cities::destroy($id);
    }

    public function findById(int $id) {
        return Cities::findOrFail($id);
    }
}