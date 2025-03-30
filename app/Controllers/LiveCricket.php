<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LiveCricket extends Controller
{
    private $apiKey = '285cc4b5-6bb5-4091-a592-d4c760e048fe'; // CricketData API Key

    public function index()
    {
        // Placeholder if needed later
        return redirect()->to('/cricbuzz');
    }

    public function cricbuzz()
    {
        $apiUrl = "https://api.cricapi.com/v1/currentMatches?apikey={$this->apiKey}&offset=0";

        $response = @file_get_contents($apiUrl);
        $data = json_decode($response, true);

        $matches = $data['data'] ?? [];

        return view('cricketers/cricbuzz', [
            'matches' => $matches,
            'commentary' => []
        ]);
    }

    public function commentary($matchId = null)
    {
        if (!$matchId) {
            return redirect()->to('/cricbuzz');
        }

        $apiUrl = "https://api.cricapi.com/v1/match_scorecard?apikey={$this->apiKey}&id={$matchId}";
        $response = @file_get_contents($apiUrl);
        $data = json_decode($response, true);

        $commentaryList = [];

        if (!empty($data['data']['scorecard'])) {
            foreach ($data['data']['scorecard'] as $entry) {
                if (!empty($entry['commentary'])) {
                    $commentaryList[] = [
                        'text' => $entry['commentary'],
                        'ball' => $entry['over'] ?? '-',
                        'batsman' => $entry['batsman'] ?? '',
                    ];
                }
            }
        }

        return view('cricketers/cricbuzz', [
            'matches' => [],
            'commentary' => $commentaryList
        ]);
    }
}
