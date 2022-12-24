<?php

namespace App\Console\Commands;

use App\Repositories\CityRepository;
use App\Services\DadataService;
use Illuminate\Console\Command;

class CallCleanDadataApi extends Command
{

    protected $signature = 'dadata:clean';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(DadataService $dadataService, CityRepository $cityRepository): void
    {
        $cityRepository->cleanCities($dadataService);
    }
}
