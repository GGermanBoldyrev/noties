<?php

namespace app\controllers;

use app\core\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return $this->render('profile');
    }

    // TODO implement this method
    public function updateImage() {}

    // TODO implement this method
    public function updatePassword() {}

}