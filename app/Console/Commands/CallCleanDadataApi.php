<?php

namespace App\Console\Commands;

use App\Repositories\CityRepository;
use App\Services\DadataService;
use Illuminate\Console\Command;

class CallCleanDadataApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dadata:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(DadataService $dadataService, CityRepository $cityRepository)
    {
        $cityRepository->cleanCities($dadataService);
    }
}
