<?php 

namespace srcApp\app\controllers;

use srcApp\app\libraries\Controller;

class Posts extends Controller
{

    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        //get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts,
        ];

        $this->view('posts/index', $data);
    }
}