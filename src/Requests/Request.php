<?php

namespace LaraLuke\Mapbox\Requests;

use GuzzleHttp\Client;

class Request
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('mapbox.base_url'),
            'timeout'  => config('mapbox.request_timeout'),
        ]);
    }

    protected function uri(string $endpoint)
    {
        return $endpoint . '?access_token=' . config('mapbox.access_token');
    }

    protected function get($endpoint)
    {
        try {
            $response = $this->client->get($this->uri($endpoint));

            return json_decode($response->getBody());
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }
}