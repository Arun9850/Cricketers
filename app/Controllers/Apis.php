<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Apis extends Controller
{
    public function getPlayerStats($playerId)
    {
        $apiUrl = "https://api.cricapi.com/v1/players_info?apikey=YOUR_API_KEY&id=" . $playerId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return $this->response->setJSON(json_decode($response));
    }
}
