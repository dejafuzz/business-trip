<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessTrips extends Model
{
    use HasFactory;

    protected $table = 'business_trips';
    protected $guarded = [];

    public function employeeId() {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
    public function originCities() {
        return $this->belongsTo(Cities::class, 'origin_city_id', 'id');
    }
    public function destinationCities() {
        return $this->belongsTo(Cities::class, 'destination_city_id', 'id');
    }
    public function approveBy() {
        return $this->belongsTo(Cities::class, 'approved_by', 'id');
    }
}