<?php

namespace App\Console\Commands;

use App\Repositories\DirectionRepository;
use Illuminate\Console\Command;

class GetAvailableDirections extends Command
{
    protected $signature = 'get:directions {--D|district=*} {--R|region=*}';

    protected $description = 'get directions with types ';

    public function handle(DirectionRepository $directionRepository): void
    {
        $directions = $directionRepository->getDirections($this->option('region'),$this->option('district'));
        $this->table(['id','name', 'type'], $directions);

    }

    public function __construct()
    {
        parent::__construct();
    }
}
