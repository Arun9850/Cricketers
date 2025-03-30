<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class CricketController extends Controller
{
    public function index()
    {
        $apiKey = '1bd099cf-5b62-4f33-afd3-5d7ef3240f9c';
        $apiUrl = "https://api.cricapi.com/v1/currentMatches?apikey={$apiKey}";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $today = [];
        $upcoming = [];
        $completed = [];

        $todayDate = date('Y-m-d');

        foreach ($data['matches'] as $match) {
            $matchDate = date('Y-m-d', strtotime($match['date']));
            $status = strtolower($match['status']);

            if ($status === 'completed') {
                $completed[] = $match;
            } elseif ($matchDate === $todayDate) {
                $today[] = $match;
            } elseif (strtotime($matchDate) > strtotime($todayDate)) {
                $upcoming[] = $match;
            }
        }

        return view('cricket', [
            'todayMatches' => $today,
            'upcomingMatches' => $upcoming,
            'completedMatches' => $completed,
        ]);
    }
}
