<?php 

namespace srcApp\app\controllers;

use srcApp\app\libraries\Controller;
use srcApp\app\models\Post;

class Posts extends Controller
{

    public function __construct()
    {
        //$this->postModel = $this->model('Post');
        $this->postModel = new Post;
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