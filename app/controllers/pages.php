<?php

namespace srcApp\app\controllers;

use srcApp\app\libraries\Controller;

// Pages class responsible for controlling Pages
class Pages extends Controller
{
    public function __construct()
    {
        // echo 'hello form pages controller';
    }

    public function index()
    {
        // create some data to load into vie
        $data = [
            'title' => 'Welcome to ' . SITENAME,
        ];

        // load the view
        $this->view('pages/index', $data);
    }


}
