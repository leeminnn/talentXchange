<?php

class Comments{
    private $username;
    private $commenter;
    private $rating;
    private $description;
    private $postDate;
        
    // constructor with $db as database connection
    public function __construct($username, $commenter, $rating, $description, $postDate) {
        // $this->conn = $db;
        $this->username = $username;
        $this->commenter = $commenter;
        $this->rating = $rating;
        $this->description = $description;
        $this->postDate = $postDate;
    }

    public function getUsername(){
        return $this->username;
    }
    public function getRating(){
        return $this->rating;
    }
    public function getCommenter(){
        return $this->commenter;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPostDate(){
        return $this->postDate;
    }

}
    


?>