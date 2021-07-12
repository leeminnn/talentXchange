<?php
	require_once 'api/include/common.php';
	require_once 'api/object/info.php';
	include_once 'api/config/database.php';


    if( !isset($_SESSION['username']) ) {
        header('Location: signin.php');
        return;
    }

    $username = ucwords($_SESSION['username']);
    
    // $conn=mysqli_connect('localhost','root','',"talent_exchange");
    // if(!$conn){
    //     die('Could not Connect My Sql:' .mysql_error());
    //    }

    // // $edited_info = [$_GET['email'], $_GET['firstname'], $_GET['lastname'], $_GET['occupation'], $_GET['prevschool'], $_GET['addr'], $_GET['region'], $_GET['country'], $_GET['postal'], $_GET['skill'], $_GET['bio']];

    // mysqli_query($conn,"UPDATE info set email='" . $_GET['email'] . "', firstname='" . $_GET['firstname'] . "', lastname='" . $_GET['lastname'] . "', occupation='" . $_GET['occupation'] . "', prevschool='" . $_GET['prevschool'] . "', addr='" . $_GET['addr'] . "', region='" . $_GET['region'] . "', country='" . $_GET['country'] . "', postal='" . $_GET['postal'] . "', skill='" . $_GET['skill'] . "', bio='" . $_GET['bio'] . "' WHERE username='" . $username. "'");


    // try{ 
    //     $pdo = new PDO("mysql:host=localhost; 
    //                     dbname=talent_exchange", "root", ""); 
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE,  
    //                         PDO::ERRMODE_EXCEPTION); 
    // } catch(PDOException $e){ 
    //     die("ERROR: Could not connect. "  
    //                     . $e->getMessage()); 
    // } 
      
    // try{ 
    //     $sql = "UPDATE info SET email='" . $_GET['email'] . "' WHERE username = '". $username . "' "; 
    //     $pdo->exec($sql); 
    //     echo "Records was updated successfully."; 
    // } catch(PDOException $e){ 
    //     die("ERROR: Could not able to execute $sql. " 
    //                                 . $e->getMessage()); 
    // } 
    // unset($pdo); 


    $link = mysqli_connect("localhost", "root", "root", "talent_exchange"); 
    if($link === false){ 
        die("ERROR: Could not connect. "  
                    . mysqli_connect_error()); 
    } 
    
    $attributes = ['email', 'firstname', 'lastname', 'occupation', 'prevschool', 'addr', 'region', 'country', 'postal', 'skill', 'bio'];
    foreach ($attributes as $attr) {
        if(isset($_GET[$attr])) { 
            $sql = "UPDATE info SET " . $attr . "= '" . $_GET[$attr] . "'  WHERE username= '" . $username . "' ";
            mysqli_query($link, $sql);
        }
    }
    
    header('Location: profile.php');
    return;

    if(mysqli_query($link, $sql)){ 
        echo "Record was updated successfully."; 
    } else { 
        echo "ERROR: Could not able to execute $sql. "  
                                . mysqli_error($link); 
    }  
    mysqli_close($link); 

	?>