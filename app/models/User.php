<?php

namespace srcApp\app\models;

/*
    User class
    query statements
    Bind values
*/
class User 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->singleRow();

        if($this->db->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (firstname, lastname, email, password, phoneNr, address) VALUES (:firstname, :lastname, :email, :password, :phoneNr, :address)');
        $this->db->bind(':firstname', $data['firstName']);
        $this->db->bind(':lastname', $data['lastName']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':phoneNr', $data['phoneNr']);
        $this->db->bind(':address', $data['address']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->singleRow();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)) {
            return $row;
        }else{
            return false;
        }
    }
}