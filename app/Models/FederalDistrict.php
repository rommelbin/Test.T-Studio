<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FederalDistrict extends Model
{

    protected $fillable = [
        'name',
        'city_id'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(fn(self $direction) => $direction->createFederalDistrictDirection());
    }

    private function createFederalDistrictDirection()
    {
        $direction = new Direction();

        $direction->setAttribute('name', $this->getAttribute('name') . '. Direction');
        $direction->setAttribute('type', 'federal_district');

        $direction->setAttribute('federal_district_id', $this->getAttribute('id'));

        $direction->save();
    }
}
