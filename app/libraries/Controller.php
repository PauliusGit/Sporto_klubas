<?php

namespace srcApp\app\libraries;


/** 
 * App Controller
 * Base controller
 * Load models and views
*/
class Controller
{

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
