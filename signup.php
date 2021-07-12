<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/paymentfont.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<title>Signup</title>

</head>

<?php

// YOUR CODE GOES HEREE
require_once 'api/include/common.php';
unset($_SESSION['error']);
$msg = '';
if(isset($_SESSION['error'])){
    $msg = $_SESSION['error'];
}else{
    unset($_SESSION['error']);
}

?>

<body>
	<!-- sign in -->
	<div class="sign section--full-bg" data-bg="img/bg_login.jpeg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="process_register.php" class="sign__form" method='POST'> 
							<a href="index.html" class="sign__logo">
								<img src="img/TalentXchange logo.png" alt="" style="width:200px;height:150px;">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input"  name="username" placeholder="Name">
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input"  name="password" placeholder="Password">
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" name="retype_password"  placeholder="Re-type Password">
							</div>

							<?php
								if(isset($msg)){	
									echo "
									<font color='red'>
										<h5>$msg</h5>
									</font>";
								}
								?>
							
							<input class="sign__btn" type="submit" value='Sign Up'></input>

							<span class="sign__text">Already have an account? <a href="signin.php">Sign in!</a></span>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end sign in -->

	<!-- JS -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>