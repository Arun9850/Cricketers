<?php

namespace App\Controllers;

use App\Models\CricketerModel; // Import the Cricketer Model
use CodeIgniter\Controller;

class News extends Controller
{
    public function index()
    {
        $model = new CricketerModel();
        $data['title'] = 'Cricketer Reviews';
        $data['cricketer_list'] = $model->findAll();

        echo view('templates/header', $data);
        echo view('news/index', $data);
        echo view('templates/footer', $data);
    }

    public function show($slug = null)
    {
        $model = new CricketerModel();
        $data['cricketer'] = $model->where('slug', $slug)->first();

        if (!$data['cricketer']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Cricketer not found: " . esc($slug));
        }

        $data['title'] = $data['cricketer']['name'] . ' Profile';

        echo view('templates/header', $data);
        echo view('news/show', $data); //  Make sure "view.php" exists in app/Views/news/
        echo view('templates/footer', $data);
    }

    public function new()
    {
        $data['title'] = "Add New Cricketer";

        echo view('templates/header', $data);
        echo view('news/new'); // Show "Add Cricketer" form
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = new CricketerModel();

        //  Validate form input
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

        //  Insert data into the database
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
}
