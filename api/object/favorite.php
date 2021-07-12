<?php

class Favorite{
    // object properties
    private $username;
    private $favUser;
    private $postDate;
    
        
    // constructor with $db as database connection
    public function __construct($username,$favUser,$postDate) {
        $this->username = $username;
        $this->favUser = $favUser;
        $this->postDate = $postDate;
    }

    public function getUsername(){
        return $this->username;
    }
    public function getFavUser(){
        return $this->favUser;
    }
    public function getPostDate(){
        return $this->postDate;
    }



}


?>
