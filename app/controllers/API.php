<?php

namespace srcApp\app\controllers;

use srcApp\app\libraries\Controller;
use srcApp\app\models\Post;

class API extends Controller
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Post;
    }

    public function addComment()
    {
        //print_r($_POST);
        $data = [
            'userId' => $_POST['userId'],
            'userName' => $_POST['userName'],
            'comment' => trim($_POST['comment']),
            'commentErr' => ''
        ];

        if(empty($_POST['comment'])) {
            $data['commentErr'] = 'Šis laukas negali būti tuščias';
        }elseif(strlen($_POST['comment']) > 500) {
            $data['commentErr'] = 'Komentaras negali būti ilgesnis nei 500 simbolių';
        }

        if(empty($data['commentErr'])) {
            $this->commentModel->addComment($data);
        }        
        //print_r($data);
        header('Content-Type: application/json');
        echo json_encode($data);
        die();
    }


    public function getComments()
    {
        $data = $this->commentModel->getPosts();
        header('Content-Type: application/json');
        echo json_encode($data);
        die();
    }
}
