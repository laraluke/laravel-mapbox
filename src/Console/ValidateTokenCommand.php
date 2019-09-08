<?php

namespace LaraLuke\Mapbox\Console;

use Illuminate\Console\Command;

use LaraLuke\Mapbox\Mapbox;

class ValidateTokenCommand extends Command
{
    protected $signature = 'mapbox:validate-token';

    protected $description = 'Validates your Mapbox access token';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $token = config('mapbox.access_token');

        if (!$token)
        {
            $this->error('No access token provided. Please check your .env file.');

            return;
        }

        $this->line('Validating access token (' . $token . ')');

        $mb = new Mapbox;

        $response = $mb->accounts()->retrieveToken($token);

        if (!$response['success'])
        {
            $this->error($response['message']);

            return;
        }

        $this->info($response['message']);
    }
}