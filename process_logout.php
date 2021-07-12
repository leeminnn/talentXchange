<?php

// YOUR CODE GOES HERE
require_once 'api/include/common.php';

// Unsetting or removing the current session (in Memory)
session_unset();

// Destroying the current session (remove session file on web server)
session_destroy();

// Forward user to login.php
header("Location: signin.php");
return;

?>