<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Cricketers extends Controller
{
    public function topBatsmen()
    {
        $data = [
            'title' => 'Top Batsmen',
            'players' => [
                ['name' => 'Sachin Tendulkar', 'country' => 'India'],
                ['name' => 'Virat Kohli', 'country' => 'India'],
                ['name' => 'Joe Root', 'country' => 'England'],
                ['name' => 'Ricky Ponting', 'country' => 'Australia'],
                ['name' => 'Kumar Sangakkara', 'country' => 'Sri Lanka']
            ]
        ];

        return view('cricketers/list', $data);
    }

    public function legendaryBowlers()
    {
        $data = [
            'title' => 'Legendary Bowlers',
            'players' => [
                ['name' => 'Muttiah Muralitharan', 'country' => 'Sri Lanka'],
                ['name' => 'Shane Warne', 'country' => 'Australia'],
                ['name' => 'Glenn McGrath', 'country' => 'Australia'],
                ['name' => 'James Anderson', 'country' => 'England'],
                ['name' => 'Dale Steyn', 'country' => 'South Africa']
            ]
        ];

        return view('cricketers/list', $data);
    }

    public function allRounders()
    {
        $data = [
            'title' => 'All-Rounders',
            'players' => [
                ['name' => 'Jacques Kallis', 'country' => 'South Africa'],
                ['name' => 'Kapil Dev', 'country' => 'India'],
                ['name' => 'Ben Stokes', 'country' => 'England'],
                ['name' => 'Shakib Al Hasan', 'country' => 'Bangladesh'],
                ['name' => 'Imran Khan', 'country' => 'Pakistan']
            ]
        ];

        return view('cricketers/list', $data);
    }

    public function emergingStars()
    {
        $data = [
            'title' => 'Emerging Stars',
            'players' => [
                ['name' => 'Shubman Gill', 'country' => 'India'],
                ['name' => 'Harry Brook', 'country' => 'England'],
                ['name' => 'Tristan Stubbs', 'country' => 'South Africa'],
                ['name' => 'Rahmanullah Gurbaz', 'country' => 'Afghanistan'],
                ['name' => 'Marco Jansen', 'country' => 'South Africa']
            ]
        ];

        return view('cricketers/list', $data);
    }

    public function worldCupWinners()
    {
        $data = [
            'title' => 'World Cup Winners',
            'winners' => [
                ['year' => '2023', 'team' => 'Australia'],
                ['year' => '2019', 'team' => 'England'],
                ['year' => '2015', 'team' => 'Australia'],
                ['year' => '2011', 'team' => 'India'],
                ['year' => '2007', 'team' => 'Australia'],
                ['year' => '2003', 'team' => 'Australia'],
            ]
        ];
        return view('cricketers/achievements', $data);
    }

    public function iplChampions()
    {
        $data = [
            'title' => 'IPL Champions',
            'winners' => [
                ['year' => '2024', 'team' => 'Kolkata Knight Riders'],
                ['year' => '2023', 'team' => 'Chennai Super Kings'],
                ['year' => '2022', 'team' => 'Gujarat Titans'],
                ['year' => '2021', 'team' => 'Chennai Super Kings'],
                ['year' => '2020', 'team' => 'Mumbai Indians'],
                ['year' => '2019', 'team' => 'Mumbai Indians'],
            ]
        ];
        return view('cricketers/achievements', $data);
    }

    public function mostCenturies()
    {
        $data = [
            'title' => 'Most Centuries',
            'players' => [
                ['name' => 'Sachin Tendulkar', 'centuries' => 100],
                ['name' => 'Virat Kohli', 'centuries' => 82],
                ['name' => 'Ricky Ponting', 'centuries' => 71],
                ['name' => 'Kumar Sangakkara', 'centuries' => 63],
                ['name' => 'Jacques Kallis', 'centuries' => 62],
            ]
        ];
        return view('cricketers/achievements', $data);
    }
}
