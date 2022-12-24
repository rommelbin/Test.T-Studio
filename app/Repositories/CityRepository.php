<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Support\Facades\Config;

class CityRepository
{
    public function setPreparedCities(): void
    {
        if (City::query()->count() > 1)
            return;

        $cities = Config::get('cities');

        City::query()->insert($cities);
    }

}
