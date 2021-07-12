<?php

class Rating{
    // database connection and table name
    private $conn;
    private $table_name = "rating";

    // object properties
    public $username;
    public $commenter;
    public $rating;
    public $description;
    public $postDate;
        
    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // get all coach's comments
    public function readAll() {
    
        // select all query when username equal to someone
        $query = "SELECT * FROM info i Right JOIN rating r ON i.username = r.username";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
   
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


    // get individual coach's comments
    public function read($username) {
    
        // select all query when username equal to someone
        $query = "SELECT
                        *
                    FROM
                        rating
                    WHERE 
                        username = ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind username to be updated
        $stmt->bindParam(1, $username);
    
        // execute query
        $stmt->execute();
    
        return $stmt;


    }



}


?>
