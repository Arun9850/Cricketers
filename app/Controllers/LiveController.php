<?php

namespace App\Controllers;

class LiveCricket extends BaseController
{
    public function index()
    {
        $apiKey = getenv('CRICKET_API_KEY');
        $apiUrl = "https://api.cricapi.com/v1/currentMatches?apikey=" . $apiKey;

        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        return view('cricketers/live', ['matches' => $data['data'] ?? []]);
    }
}
