<?php

namespace App\Services;

use Dadata\DadataClient;

class DadataService
{
    public DadataClient $dadataClient;

    public function __construct()
    {
        if (!env('DADATA_API_KEY')  || !env('DADATA_API_KEY')) {
            throw new \Exception('DADATA_API_KEY or DADATA_API_KEY is not set!', 422);
        }
        $this->dadataClient = new DadataClient(env('DADATA_API_KEY'), env('DADATA_SECRET_KEY'));
    }
}
