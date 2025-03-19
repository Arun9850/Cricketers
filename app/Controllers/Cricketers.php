<?php

namespace App\Controllers;

use App\Models\CricketerModel;
use App\Models\ReviewModel;
use CodeIgniter\Controller;

class Cricketers extends Controller
{
    public function index()
    {
        $model = model(CricketerModel::class);
        $data['cricketers'] = $model->findAll();
        $data['title'] = 'Cricketer Reviews';

        echo view('templates/header', $data);
        echo view('cricketers/index', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null)
    {
        $model = model(CricketerModel::class);
        $reviewModel = model(ReviewModel::class);

        $data['cricketer'] = $model->getCricketer($slug);
        if (empty($data['cricketer'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cricketer not found: ' . $slug);
        }

        $data['reviews'] = $reviewModel->getReviews($data['cricketer']['id']);
        $data['title'] = $data['cricketer']['name'];

        echo view('templates/header', $data);
        echo view('cricketers/view', $data);
        echo view('templates/footer', $data);
    }
}
