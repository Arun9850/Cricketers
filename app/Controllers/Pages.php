<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    // ✅ Static contact page route
    public function contact()
    {
        return view('pages/contact');
    }

    // ✅ Dynamic page loader
    public function view($page = 'home')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
}
