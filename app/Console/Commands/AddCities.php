<?php

namespace App\Console\Commands;

use App\Repositories\CityRepository;
use Illuminate\Console\Command;

class AddCities extends Command
{

    protected $signature = 'add:cities';

    protected $description = 'Add cities to db.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(CityRepository $cityRepository)
    {
        $cityRepository->setPreparedCities();
    }
}
