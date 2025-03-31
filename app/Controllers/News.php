<?php

namespace App\Controllers;

use App\Models\CricketerModel;
use CodeIgniter\Controller;

class News extends Controller
{
    // ✅ Declare API key
    protected $apiKey = '285cc4b5-6bb5-4091-a592-d4c760e048fe';

    public function index()
    {
        $model = new CricketerModel();
        $data['title'] = 'Cricketer Reviews';
        $data['cricketer_list'] = $model->findAll();

        // ✅ Use CurlRequest with CricAPI
        $url = "https://api.cricapi.com/v1/currentMatches?apikey={$this->apiKey}&offset=0";
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->get($url);
            $liveData = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            $liveData = ['data' => []];
        }

        $matches = $liveData['data'] ?? [];

        // ✅ Sort by date (if available)
        usort($matches, function ($a, $b) {
            return strtotime($a['dateTimeGMT']) - strtotime($b['dateTimeGMT']);
        });

        $today = date('Y-m-d');
        $data['today_matches'] = [];
        $data['upcoming_matches'] = [];
        $data['completed_matches'] = [];

        foreach ($matches as $match) {
            $matchDate = substr($match['dateTimeGMT'] ?? '', 0, 10);
            $status = strtolower($match['status'] ?? '');

            if ($matchDate === $today) {
                $data['today_matches'][] = $match;
            } elseif (str_contains($status, 'won') || $status === 'completed' || $status === 'match ended') {
                $data['completed_matches'][] = $match;
            } elseif ($matchDate > $today) {
                $data['upcoming_matches'][] = $match;
            }
        }

        // ✅ Debug temporarily
        // dd($data['today_matches'], $data['upcoming_matches'], $data['completed_matches']);

        echo view('templates/header', $data);
        echo view('news/index', $data);
        echo view('templates/footer');
    }

    public function show($slug = null)
    {
        $model = new CricketerModel();
        $data['cricketer'] = $model->where('slug', $slug)->first();

        if (!$data['cricketer']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cricketer not found: ' . $slug);
        }

        return view('news/show', $data);
    }

    public function new()
    {
        $data['title'] = "Add New Cricketer";

        echo view('templates/header', $data);
        echo view('news/new');
        echo view('templates/footer');
    }

    public function create()
    {
        $model = new CricketerModel();

        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'country' => 'required|max_length[100]',
            'matches' => 'required|integer',
            'runs' => 'required|integer',
            'average' => 'required|decimal',
            'achievements' => 'required|min_length[3]',
            'image' => 'permit_empty|valid_url'
        ])) {
            return redirect()->to(site_url('news/new'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->insert([
            'name' => $this->request->getPost('name'),
            'country' => $this->request->getPost('country'),
            'matches' => $this->request->getPost('matches'),
            'runs' => $this->request->getPost('runs'),
            'average' => $this->request->getPost('average'),
            'achievements' => $this->request->getPost('achievements'),
            'slug' => url_title($this->request->getPost('name'), '-', true),
            'image' => $this->request->getPost('image')
        ]);

        return redirect()->to(site_url('news'))->with('success', 'Cricketer added successfully!');
    }

    public function t20iResults()
    {
        $json = file_get_contents(WRITEPATH . 'uploads/t20i_matches.json');
        $data = json_decode($json, true);

        $fixtures = $data['data'];
        $matches = [];

        foreach ($fixtures as $match) {
            if ($match['type'] === 'T20I') {
                $matches[] = [
                    'round' => $match['round'],
                    'starting_at' => $match['starting_at'],
                    'status' => $match['status'],
                    'note' => $match['note'],
                    'localteam_id' => $match['localteam_id'],
                    'visitorteam_id' => $match['visitorteam_id'],
                    'winner_team_id' => $match['winner_team_id']
                ];
            }
        }

        return view('news/t20i_results', ['matches' => $matches]);
    }
}
