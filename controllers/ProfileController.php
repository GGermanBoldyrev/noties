<?php

namespace app\controllers;

use app\core\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return $this->render('profile');
    }
}