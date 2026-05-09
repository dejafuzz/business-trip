<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = [];

    public function originCities() {
        return $this->hasMany(Cities::class, 'origin_city_id', 'id');
    }
    public function destinationCities() {
        return $this->hasMany(Cities::class, 'destination_city_id', 'id');
    }
}