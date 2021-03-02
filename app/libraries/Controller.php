<?php

namespace srcApp\app\libraries;

use srcApp\app\models\Post;
use srcApp\app\models\User;

/** 
 * App Controller
 * Base controller
 * Load models and views
*/
class Controller
{
    // Load model 
    public function model($model)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            // require model file
            //require_once '../app/models/' . $model . '.php';

            //Make object of that class
            if($model == 'Post'){
                return new Post;
            }elseif($model == 'User'){
                return new User;
            }
            
        } else {
            die('model does not exist');
        }
    }

    // Load View
    public function view($view, $data = [])
    {
        // check if view exist 
        if (file_exists("../app/views/$view.php")) {
            // if view exist we require it 
            // we load this view
            require_once "../app/views/$view.php";
        } else {
            die('View does not exist');
        }
    }
}
