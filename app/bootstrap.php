<?php
//load config file
require_once 'config/config.php';
require_once 'helpers/session_start.php';

// load libraries files
spl_autoload_register(function ($className) {
    require_once "libraries/$className.php";
});
