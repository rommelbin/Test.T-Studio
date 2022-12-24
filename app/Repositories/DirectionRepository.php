<?php

namespace App\Repositories;

use App\Models\Direction;

class DirectionRepository
{
    public function getDirections(array $region_ids = null, array $district_ids = null): array
    {
        $query = Direction::query();

        if (!empty($region_ids))
            $query->orWhereIn('region_id', $region_ids );

        if (!empty($district_ids))
            $query->orWhereIn('federal_district_id', $district_ids);

        $query->select('id', 'name', 'type');
        $query->orderBy('type');

        return $query->get()->toArray();
    }
}
