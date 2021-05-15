<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'car_id',
        'model',
    ];

    /**
     * Get the car that owns the model.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
