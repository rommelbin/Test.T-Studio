<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\FederalDistrict;
use App\Models\Region;
use App\Services\DadataService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CityRepository
{
    public function setPreparedCities(): void
    {
        if (City::query()->count() > 1)
            return;

        $cities = Config::get('cities');

        City::query()->insert($cities);
    }

    public function cleanCities(DadataService $dadataService)
    {
        $rawCities = City::query()
            ->doesntHave('federalDistrict')
            ->doesntHave('region')->get()->all();

        /**
         * @var City $rawCity
         */
        foreach ($rawCities as $rawCity) {
            $response = $dadataService->dadataClient->clean('address', $rawCity->getAttribute('name'));
            if (!is_null($response['federal_district']) && !is_null($response['region'])) {
                $federalDistrict = new FederalDistrict();
                $federalDistrict->setAttribute('name', $response['federal_district']);
                $federalDistrict->setAttribute('city_id', $rawCity->getAttribute('id'));

                $region = new Region();
                $region->setAttribute('name', $response['region']);
                $region->setAttribute('city_id', $rawCity->getAttribute('id'));

                try {
                    DB::beginTransaction();
                    $federalDistrict->save();
                    $region->save();
                } catch (\Exception) {
                    DB::rollBack();
                }
                DB::commit();
            }

        }
    }

}
