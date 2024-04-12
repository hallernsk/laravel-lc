<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-json-placeholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from JSON Placeholder(Guzzle)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'users');

        // $client = new \GuzzleHttp\client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
        // $response = $client->request('GET', 'users');

        // так через фасад Http - проще
        // $response = Http::get('https://jsonplaceholder.typicode.com/users'); // ok
        // $response = Http::get('http://ngs.ru'); // ok
        // dd($response->json());

        dd(json_decode($response->getBody()->getContents()));
    }
}
