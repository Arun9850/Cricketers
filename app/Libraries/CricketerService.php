<?php

namespace App\Libraries;

class CricketerService
{
    public function getTopBatsmen()
    {
        // Example static data
        return [
            ['name' => 'Virat Kohli', 'runs' => 12000],
            ['name' => 'Babar Azam', 'runs' => 8000],
        ];
    }

    public function getWorldCupWinners()
    {
        return [
            ['year' => 2019, 'team' => 'England'],
            ['year' => 2015, 'team' => 'Australia'],
        ];
    }
}
