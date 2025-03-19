<?php

namespace App\Controllers;

use App\Models\CricketerModel;
use CodeIgniter\Controller;

class Ajax extends Controller
{
    public function get($slug = null)
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
}
