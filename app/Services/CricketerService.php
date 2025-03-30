<?php

namespace App\Services;

class CricketerService
{
    protected $apiKey;

    public function __construct()
    {
        // Read the API key from the .env file
        $this->apiKey = getenv('API_KEY');
    }

    public function getCricketerData($category)
    {
        // Assume API endpoint that handles categories like batsmen, bowlers, etc.
        $url = "https://api.cricketers.com/data?category=$category&api_key=" . $this->apiKey;

        // Make the API request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request and close the connection
        $response = curl_exec($ch);
        curl_close($ch);

        // Check if the response is valid
        if ($response) {
            return json_decode($response, true); // Return the response data as an array
        }

        return null; // Return null if no data is found
    }
}
