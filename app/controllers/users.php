<?php 

namespace srcApp\app\controllers;

use srcApp\app\libraries\Controller;
use srcApp\app\models\User;

class Users extends Controller
{
    public function __construct()
    {
        //$this->userModel = $this->model('User');
        $this->userModel = new User;
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'phoneNr' => trim($_POST['phoneNr']),
                'address' => trim($_POST['address']),
                'firstName_err' => '',
                'lastName_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            if(empty($data['email'])) {
                $data['email_err'] = 'Įveskite elektroninį paštą';
            } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = 'Netinkamas El.Pašto formatas';
            }
            else {
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'El.Pašto adresas jau naudojamas';
                }
            }

            if(empty($data['firstName'])) {
                $data['firstName_err'] = 'Įveskite vardą';
            }else{
                if(strlen($data['firstName']) > 40){
                    $data['firstName_err'] = 'vardas negali viršyti 40 simbolių';
                }
            }

            if(empty($data['lastName'])) {
                $data['lastName_err'] = 'Įveskite pavardę';
            }else{
                if(strlen($data['lastName']) > 40){
                    $data['lastName_err'] = 'vardas negali viršyti 40 simbolių';
                }
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'Įveskite slaptažodį';
            }elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if(empty($data['phoneNr'])) {
                $data['phoneNr'] = '0';
            }

            if(empty($data['email_err']) && empty($data['firstName_err']) && empty($data['lastName_err']) && empty($data['password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->userModel->register($data)){
                    header('Location:' . URLROOT . '/users/login');
                }else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            } 

        }else {
            $data = [
                'firstName' => '',
                'lastName' => '',
                'email' => '',
                'password' => '',
                'phoneNr' => '',
                'address' => '',
                'firstName_err' => '',
                'lastName_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if(empty($data['email'])) {
                $data['email_err'] = 'Įveskite elektroninį paštą';
            }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = 'Netinkamas El.Pašto formatas';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'Įveskite slaptažodį';
            }

            if($this->userModel->findUserByEmail($data['email'])){

            }else{
                $data['email_err'] = 'Toks El.Pašto adresas nerastas';
            }

            if(empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser){
                    $this->createSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Slaptažodis neteisingas';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            } 

        }else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login', $data);
        }
    }

    public function createSession($loggedInUser)
    {
        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['user_email'] = $loggedInUser->email;
        $_SESSION['user_name'] = $loggedInUser->firstname;
        header('Location:' . URLROOT . '/pages/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        header('Location:' . URLROOT . '/users/login');
    }

}