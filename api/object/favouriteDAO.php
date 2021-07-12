<?php
require_once 'api/config/database.php';
require_once 'api/object/favorite.php';

class FavoriteDAO{
      
    // get info with username

    // public function getFavUsername($username) {
    //     // STEP 1
    //     $connMgr = new Database();
    //     $pdo = $connMgr->getConnection(); // PDO object

    //     // select all query
    //     $sql = " SELECT favUser FROM favorite 
    //             WHERE username = :username
    //                 ";
    
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        
    //     // STEP 3
    //     $stmt->execute();
    //     $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    //     // STEP 4
    //     $lists = [];
    //     while ($row = $stmt->fetch() ) {
    //         $list = $row;
    //         $lists[] = $list;

    //         // var_dump($row);
    //     }

        
    //     // STEP 5
    //     $stmt = null;
    //     $pdo = null;        
        

    //     // STEP 6
    //     return $lists;

    // }
    public function addFav($username, $favUser) {
        // STEP 1
        $connMgr = new Database();
        $pdo = $connMgr->getConnection(); // PDO object
        
        // STEP 2
        $sql = "INSERT INTO 
                    favorite
                VALUE
                    (:username, :favUser, CURRENT_DATE)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':favUser', $favUser, PDO::PARAM_STR);
        
        // STEP 3
        $isOk = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $pdo = null;        
        
        // STEP 5
        return $isOk;
    }

    public function delFav($username, $favUser) {
    
        $connMgr = new Database();
        $pdo = $connMgr->getConnection(); // PDO object
        
        // STEP 2
        $sql = "DELETE FROM favorite 
                WHERE username = :username
                AND favUser = :favUser";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':favUser', $favUser, PDO::PARAM_STR);
        
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
