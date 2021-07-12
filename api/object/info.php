<?php

class Info{
    // database connection and table name
    private $conn;
    private $table_name = "info";

    // object properties
    public $username;
    public $bio;
    public $gender;
    public $age;
    public $img;
    public $contact;
    public $talent_cat;
    public $skill;
    public $youtube;
    public $yr_exp;
    public $postal;
    public $unit;
    public $rating;
    public $description;
    public $postDate;
    public $email;
    public $firstname;
    public $lastname;
    public $addr;
    public $region;
    public $country;
    public $occupation;
    public $prevschool;
    public $favUser;
    
        
    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // get all coaches
    public function read() {
    
        // select all query
        $query = "SELECT
                        *
                    FROM
                        info";

    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // get info with username
    public function readOne() {
    
        // select all query
        $query = "SELECT
                        *
                    FROM
                        info
                    WHERE 
                        username = ?
                    LIMIT
                        0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind username to be updated
        $stmt->bindParam(1, $this->username);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->username = $row['username'];
        $this->gender = $row['gender'];
        $this->bio = $row['bio'];
        $this->age = $row['age'];
        $this->img = $row['img'];
        $this->contact = $row['contact'];
        $this->talent_cat = $row['talent_cat'];
        $this->skill = $row['skill'];
        $this->youtube = $row['youtube'];
        $this->yr_exp = $row['yr_exp'];
        $this->postal = $row['postal'];
        $this->unit = $row['unit'];
        $this->email = $row['email'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->addr = $row['addr'];
        $this->region = $row['region'];
        $this->country = $row['country'];
        $this->occupation = $row['occupation'];
        $this->prevschool = $row['prevschool'];
        

    }

    public function getFavUser() {
        // select all query
        $query = "SELECT * FROM INFO WHERE USERNAME IN (
                    SELECT f.favuser FROM info i 
                    INNER JOIN favorite f
                    ON i.username = f.username
                    WHERE i.username = ?);
                    ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind username to be updated
        $stmt->bindParam(1, $this->username);

        // execute query
        $stmt->execute();
    
        return $stmt;

    }

    public function getFavUsername() {
        // select all query
        $query = " SELECT f.favuser FROM info i 
                    INNER JOIN favorite f 
                    ON i.username = f.username 
                    WHERE f.username = ?
                    ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind username to be updated
        $stmt->bindParam(1, $this->username);

        // execute query
        $stmt->execute();
    
        return $stmt;

    }

    

    // public function search_by_gender($gender) {
        
    //     // select all query
    //     $query = "SELECT
    //                 *
    //                 FROM
    //                     info
    //                 WHERE
    //                     gender = ?
    //                 ORDER BY
    //                     username";
    
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
            
    //     // bind
    //     $stmt->bindParam(1, $gender);
    
    //     // execute query
    //     $stmt->execute();
    
    //     return $stmt;
    // }

    // public function search_by_talent($talent_cat){
    //     $query = "SELECT *
    //                 FROM 
    //                     info
    //                 WHERE
    //                     talent_cat = ?";

    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
            
    //     // bind
    //     $stmt->bindParam(1, $talent_cat);
    
    //     // execute query
    //     $stmt->execute();
    
    //     return $stmt;
    // }

    // public function search_by_age($yr_exp){
    //     // select all query
    //     $query = "SELECT
    //                 *
    //                 FROM
    //                     info
    //                 WHERE
    //                     yr_exp between ? AND ?
    //                 ORDER BY
    //                     id";

    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);

    //     // bind
    //     $stmt->bindParam(1, $yr_exp);
    //     $end_year = $yr_exp + 9;
    //     $stmt->bindParam(2, $end_year);

    //     // execute query
    //     $stmt->execute();

    //     return $stmt;
    // }

    // // the input age is the age group. eg. 30:30-39, 40:40-49
    // public function search_by_gender_age($gender, $yr_exp) {
        
    //     // select all query
    //     $query = "SELECT
    //                 *
    //                 FROM
    //                     info
    //                 WHERE
    //                     gender = ?
    //                     AND
    //                     yr_exp between ? AND ?
    //                 ORDER BY
    //                     username";
    
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
            
    //     // bind
    //     $stmt->bindParam(1, $gender);
    //     $stmt->bindParam(2, $yr_exp);
    //     $end_year = $yr_exp + 9;
    //     $stmt->bindParam(3, $end_year);
    
    //     // execute query
    //     $stmt->execute();
    
    //     return $stmt;
    // }

    // public function search_by_gender_talent($gender, $talent_cat) {
        
    //     // select all query
    //     $query = "SELECT
    //                 *
    //                 FROM
    //                     info
    //                 WHERE
    //                     gender = ?
    //                     AND
    //                     talent_cat = ?
    //                 ORDER BY
    //                     username";
    
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
            
    //     // bind
    //     $stmt->bindParam(1, $gender);
    //     $stmt->bindParam(2, $talent_cat);
    
    //     // execute query
    //     $stmt->execute();
    
    //     return $stmt;
    // }

    // public function search_by_talent_age($talent_cat, $yr_exp) {
        
    //     // select all query
    //     $query = "SELECT
    //                 *
    //                 FROM
    //                     info
    //                 WHERE
    //                     talent_cat = ?
    //                     and 
    //                     yr_exp between ? AND ?
    //                 ORDER BY
    //                     username";
    
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
            
    //     // bind
    //     // bind
    //     $stmt->bindParam(1, $talent_cat);
    //     $stmt->bindParam(2, $yr_exp);
    //     $end_year = $yr_exp + 9;
    //     $stmt->bindParam(3, $end_year);
    
    //     // execute query
    //     $stmt->execute();
    
    //     return $stmt;
    // }

    // public function search_by_gender_talent_age($gender, $talent_cat, $yr_exp) {
        
    //     // select all query
    //     $query = "SELECT
    //                 *
    //                 FROM
    //                     info
    //                 WHERE
    //                     gender = ?
    //                     AND
    //                     talent_cat = ?
    //                     AND
    //                     yr_exp BETWEEN ? AND ?
    //                 ORDER BY
    //                     username";
    
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
            
    //     // bind
    //     $stmt->bindParam(1, $gender);
    //     $stmt->bindParam(2, $talent_cat);
    //     $stmt->bindParam(3, $yr_exp);
    //     $end_year = $yr_exp + 9;
    //     $stmt->bindParam(4, $end_year);
    
    //     // execute query
    //     $stmt->execute();
    
    //     return $stmt;
    // }



}


?>
