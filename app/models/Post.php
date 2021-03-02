<?php

namespace srcApp\app\models;

use srcApp\app\libraries\Database;

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT * FROM posts');

        $results = $this->db->resultSet();

        return $results;
    }


    public function addComment($data)
    {
        // get data and add comment using data
        $this->db->query("INSERT INTO posts (user_id, author, comment_body) VALUES (:user_id, :author, :comment_body)");
        // bind the values
        $this->db->bind(':user_id', $data['userId']);
        $this->db->bind(':author', $data['userName']);
        $this->db->bind(':comment_body', $data['comment']);

        // make query 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

} 