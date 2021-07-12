<?php

require_once 'api/include/common.php';

if( isset($_POST['username']) && isset($_POST['password']) ) {

    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $dao = new AccountDAO();
    
    // Authenticate
    // YOUR CODE GOES HERE
    $isValid = $dao->authenticate($username,$password);


    // If authentication is successful
    // 1) Save $username as a Session Variable
    // 2) Redirect user to home.php
    if($isValid){
        $_SESSION['username'] = $username;
        // header('Location: index.php');
        $login_status = "Sign Out";
        $_SESSION['loggedin'] = $login_status;
        
        header('Location: profile.php');
        return;
    }
    else{
    // If authentication failed
    $msg = "Username and password incorrect";
    // 1) Save $msg as a Session Variable
    $_SESSION['error'] = $msg;
    //    --> signin.php will check for it and display it (if any)
    header('Location: signin.php');
    // 2) Redirect user to signin.php
    return;
    }
}
else {
    // Oh no...
    // Both username and password are needed.
    // Looks like this user hasn't given both!

    $msg = "Please provide both username and password";
    // 1) Save $msg as a Session Variable
    $_SESSION['error'] = $msg;
    // 2) Redirect user to signin.php
    header('Location: signin.php');
    return;
}

?>
