<?php
session_start();
require_once 'api/include/common.php';


if( trim($_POST['username']) != '' && trim($_POST['password']) && trim($_POST['retype_password']) ) {

    // All 3 form input fields are filled out!
    // Retrieve form input values
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];

    if($password != $retype_password){
        // If passwords do not match:
        // 1) Register Error message
        $msg = "Passwords do not match";
        $_SESSION['error'] = $msg;
        // 2) Redirect user to register.php
        header("Location: signup.php");
    }else{
        // Passwords do match so proceed with registration!
        $dao = new AccountDAO();
        // Check out AccountDAO's register($username, $hashed_password) method
        // How do I encrypt $password and save it into $hashed_password?
        // HINT: password_hash()
        // After encrypting, call register($username, $hashed_password)
        // What does register() return? TRUE? FALSE?
        $account_object = $dao->register($username,$password);
        
        if($account_object!=null){

            // If registration in Account table was SUCCESSFUL
            // 1) Register Success message
            //    This message will be accessed from login.php
            $msg = "User $username has been successfully registered!";
            // 2) Redirect user to login.php
            $_SESSION['succeed'] = $msg;
            header("Location: signin.php");
            return;
            }else{      
                // If registration in Account table was NOT SUCCESSFUL
                // 1) Register Error message
                $msg = "User $username could not be registered!";
                $_SESSION['error'] = $msg;
                // 2) Redirect user to login.php
                header("Location: signup.php");
                return;
            }
    }
    
}
else {
    // Oh oh... not all 3 input fields are filled out!

    // 1) Register Error message as a Session Variable
    $msg = "All 3 fields must be filled out";
    $_SESSION['error'] = $msg;

    // 2) Redirect user to register.php
    header("Location: signup.php");

}

?>
<!-- 
<html>
    <body>
        <?php
            echo $msg;
        ?>
    </body>
</html> -->