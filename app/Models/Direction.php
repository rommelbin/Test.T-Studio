<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{

    protected $fillable = [
        'name',
        'type',
        'federal_district_id',
        'region_id',
    ];

}
