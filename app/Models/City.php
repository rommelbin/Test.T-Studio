<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{

    public function federalDistrict(): HasOne
    {
        return $this->hasOne(FederalDistrict::class);
    }

    public function region(): HasOne
    {
        return $this->hasOne(Region::class);
    }

}
