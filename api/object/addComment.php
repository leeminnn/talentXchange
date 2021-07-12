<?php
require_once 'api/config/database.php';
require_once 'api/object/comments.php';
class addComment{
    // database connection and table name
    // private $conn;
    // private $table_name = "rating";

    // object properties
    
    // get all coach's comments

    public function add($username,$commenter,$rating,$description) {
        // $query = "INSERT INTO 
        //             RATING
        //         VALUE
        //             (?, ?, ?, ?, CURRENT_DATE)";
    
        // // prepare query statement
        // $stmt = $this->conn->prepare($query);

        // // bind username to be updated
        // $stmt->bindParam(1, $username);
        // $stmt->bindParam(2, $commenter);
        // $stmt->bindParam(3, $rating);
        // $stmt->bindParam(4, $description);
    
        // // execute query
        // $stmt->execute();
    
        // return $stmt;


        // STEP 1
        $connMgr = new Database();
        $pdo = $connMgr->getConnection(); // PDO object
        
        // STEP 2
        $sql = "INSERT INTO 
                    RATING
                VALUE
                    (:username, :commenter, :rating, :description, CURRENT_DATE)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':commenter', $commenter, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        
        // STEP 3
        $isOk = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $pdo = null;        
        
        // STEP 5
        return $isOk;


    }

}


?>
