<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_Truck extends Model
{
    use HasFactory;

    protected $table = "schedule_truck";

    protected $fillable = [
        'driver_id',
        'truck_id',
        'cargo',
        'destination',
        'status',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
