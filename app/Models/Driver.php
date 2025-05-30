<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'Name', 
        'Age', 
        'Address', 
        'Contact_Number', 
        'Gender', 
        'License_number', 
        'Duty_hours'
    ];

    public function schedule_trucks()
    {
        return $this->hasMany(Schedule_Truck::class);
    }
}

