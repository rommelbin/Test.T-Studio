<?php

namespace App\Services;

use Dadata\DadataClient;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class DadataService
{
    public function init()
    {
        $token = env('DADATA_API_KEY');
        $secret = env('DADATA_SECRET_KEY');
        $dadata = new DadataClient($token, $secret);

        dd($dadata->clean('address', 'лбм'));

    }
}
