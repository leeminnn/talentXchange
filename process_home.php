<?php

require_once 'api/include/common.php';

if( isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $dao = new AccountDAO();

    $msg = "Sign In";
    // 2) Redirect user to login.php
    $_SESSION['succeed'] = $msg;
    header("Location: signin.php");

}
?>