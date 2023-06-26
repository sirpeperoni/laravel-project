<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    /**
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
           'base_uri' => 'localhost/api/clients/works/',
           'timeout' => 5.0,
            'verify'=>false,
        ]);
    }

}
