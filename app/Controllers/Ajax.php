<?php

namespace App\Controllers;

use App\Models\CricketerModel;
use CodeIgniter\Controller;

class Ajax extends Controller
{
    public function getAllCricketers()
    {
        $model = new CricketerModel();
        $cricketers = $model->findAll();
        return $this->response->setJSON($cricketers);
    }

    public function getCricketer($slug = null)
    {
        if ($slug === null) {
            return $this->response->setJSON(['error' => 'Slug is missing']);
        }

        $model = new CricketerModel();
        $cricketer = $model->where('slug', $slug)->first();

        if (!$cricketer) {
            return $this->response->setJSON(['error' => 'Cricketer not found']);
        }

        return $this->response->setJSON($cricketer);
    }

    public function search()
    {
        $query = $this->request->getGet('q');

        if (!$query) {
            return $this->response->setJSON([]);
        }

        // Search local database first
        $db = \Config\Database::connect();
        $builder = $db->table('cricketers');
        $builder->like('name', $query);
        $builder->select('name, slug, country');
        $results = $builder->get()->getResultArray();

        if (!empty($results)) {
            return $this->response->setJSON($results);
        }

        // Fetch from CricAPI if not found locally
        $apiKey = '285cc4b5-6bb5-4091-a592-d4c760e048fe';
        $apiUrl = 'https://api.cricapi.com/v1/players?apikey=' . $apiKey . '&search=' . urlencode($query);

        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get($apiUrl);
            $json = json_decode($response->getBody(), true);

            $players = [];

            if (isset($json['data'])) {
                foreach ($json['data'] as $player) {
                    $players[] = [
                        'name' => $player['name'],
                        'slug' => url_title($player['name'], '-', true),
                        'country' => $player['country'] ?? 'Unknown',
                        'external' => true
                    ];
                }
            }

            return $this->response->setJSON($players);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'API error: ' . $e->getMessage()]);
        }
    }

    // ✅ Add Cricketer to DB
    public function addCricketer()
    {
        $request = service('request');
        $data = $request->getPost();

        if (!$data['name'] || !$data['slug'] || !$data['country']) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Missing required fields']);
        }

        $model = new CricketerModel();

        $inserted = $model->insert([
            'name'         => $data['name'],
            'slug'         => $data['slug'],
            'country'      => $data['country'],
            'image'        => '',
            'matches'      => 0,
            'runs'         => 0,
            'average'      => 0,
            'achievements' => 'Imported via API',
        ]);

        if ($inserted) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Insert failed']);
        }
    }
}
