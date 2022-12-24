<?php

namespace App\Services;

use Dadata\DadataClient;

class DadataService
{
    public DadataClient $dadataClient;

    public function __construct()
    {
        $this->dadataClient = new DadataClient(env('DADATA_API_KEY'), env('DADATA_SECRET_KEY'));
    }
}
