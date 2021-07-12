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
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<title>Signin</title>

	<style>
		.sign__form {
			background-color: #fff;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			color: black;
			box-shadow: 0 1px 15px 0 rgba(0,0,0,0.12);
			border-radius: 6px;
			padding: 40px 20px;
			position: relative;
			width: 100%;
			max-width: 400px;
		}

		.sign__input {
			color: black;
		}	
	</style>
</head>
<?php

	require_once 'api/include/common.php';
	require_once 'api/object/info.php';
	include_once 'api/config/database.php';

	

	$msg = '';
	if(isset($_SESSION['error'])){
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}

	$success = '';
	if(isset($_SESSION['succeed'])){
		$success = $_SESSION['succeed'];
		unset($_SESSION['succeed']);
	}

	if($_GET["s"]=="Sign Out"){
		session_destroy();
	}

	$login_status = '';
	if(isset($_SESSION['loggedin'])){
		$login_status = 'Sign Out';
	}else{
		$login_status = "Sign In";
		unset($_SESSION['loggedin']);
	}
?>

<body>
		<!-- header -->
		<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<button class="header__menu" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>

							<a href="index.php" class="header__logo">
								<img src="img/talentxchange_logo.jpg" alt="" style="height:50px;width:100px;">
							</a>

							<ul class="header__nav">
								<li class="header__nav-item">
									<a class="header__nav-link" href="index.php">Explore</a>
								</li>

								<li class="header__nav-item">
									<a class="header__nav-link" href="favourites.html">Favorites</a>
								</li>

								<div class="header__nav-item">
									<a class="header__nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									  Notification  
									</a>
								</div>

								<li class="header__nav-item">
									<a class="header__nav-link" href="about.php">About Us</a>
								</li>
							</ul>

							<div class="header__actions">
								<div class="header__lang">
									<a class="header__lang-btn" href="profile.php" role="button" id="">
										<!-- <img src="img/cards/YiMeng.jpg" alt=""> -->

										<span></span> 
									</a>
								</div>
								<a href="signin.php" class="header__login">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='288 336 368 256 288 176' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='80' y1='256' x2='352' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
									 <span>Sign In</span> 					
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    
	</header>
	<!-- end header -->
	<!-- sign in -->
	<div class="sign section--full-bg" data-bg="img/bg_login.jpeg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action='process_login.php' method='POST' class="sign__form">
							<a href="" class="sign__logo">
								<img src="img/TalentXchange logo.png" alt="" style="width:200px;height:150px;">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" name="username" placeholder="Username">
								
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input"  name="password" placeholder="Password">
							</div>
							
							<input class="sign__btn" type="submit" value="Sign in">

							<?php
								if( isset($msg) ) {
									echo "
										<font color='red'>
											<h5>
												$msg
											</h5>
										</font>
									";
								}

								if( isset($success) ) {
									echo "
										<font color='blue'>
											<h5>
												$success
											</h5>
										</font>
									";
								}
							?>

							<span class="sign__text">Don't have an account? <a href="signup.php">Sign up!</a></span>

							<!-- <span class="sign__text"><a href="forgot.html">Forgot password?</a></span> -->
						</form>
						<!-- end authorization form -->
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