<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        "car_name",
        "model",
        "year",
        "description"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
