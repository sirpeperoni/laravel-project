<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{

    protected $signature = 'import:jsonplaceholder';
    protected $description = 'Get data from jsonplaceholder';



    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('POST', 'create-work', [
            'form_params' => [
                "workName" => "GGGGG",
                "workId" => "99",
            ]
        ]);
        dd(json_decode($response->getBody()));

        //dd(json_decode($response->getBody()->getContents()));
    }
}
