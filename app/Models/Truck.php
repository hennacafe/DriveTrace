<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $table = 'trucks';

    protected $fillable = [
        'Plate_number',
        'Brand',
        'Model',
        'color',
    ];

    public function schedule_trucks()
    {
        return $this->hasMany(Schedule_Truck::class);
    }
}
