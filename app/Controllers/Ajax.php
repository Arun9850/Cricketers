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

    // ✅ Autocomplete Search Function
    public function search()
    {
        $query = $this->request->getGet('q');

        if (!$query) {
            return $this->response->setJSON([]);
        }

        // Use the CricketerModel if available
        $model = new CricketerModel();

        $results = $model->like('title', $query)
                         ->select('title AS name, slug, country')
                         ->findAll(10); // Limit results for better performance

        return $this->response->setJSON($results);
    }
}
