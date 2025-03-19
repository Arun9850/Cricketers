<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function login()
    {
        return view('user/login.phpge');
    }
    public function logout()
    {
        return view('user/logout.php');
    }
}