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
	<link rel="stylesheet" href="css/main.css"> 
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<script src="js/explore.js"></script>
	
	<script>  
        window.onbeforeunload = function () {
            window.scrollTo(0, 0);
        }; 
	 </script>
	 
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	
	<title>TalentXchange</title>
	<style>
		a{
			color:cornsilk
		}
		a:hover{
			color:black;
		}

		#carouselExampleCaptions img{
			height: 500px;
			width: 100%;
			background-repeat: no-repeat;
			background-position: center;
			/* background-size: 640px ; */
		}

		#coach img{
			height: 200px;
			width: 350px;
			background-repeat: no-repeat;
			background-position: center;
			background-size: 340px ;
		}

	</style>
</head>

<?php
	require_once 'api/include/common.php';
	require_once 'api/object/info.php';
	include_once 'api/config/database.php';

	$username = "";
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
	}else{
		$username = "";
	}

	$username = ucwords($_SESSION['username']);

	$login_status = '';
	if(isset($_SESSION['loggedin'])){
		$login_status = 'Sign Out';
	}else{
		$login_status = "Sign In";
		unset($_SESSION['loggedin']);

	}
?>


<body onload="start()" >
	<!-- header -->
	<span id="username" style="display:none"><?= $username?></span>
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
									<!-- <span class="badge badge-pill badge-danger">2</span> -->
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									  <a class="dropdown-item" href="index.php">These are the profiles you may be interested in!</a>
									  <a class="dropdown-item" href="#">Hurray! Welcome to TalentXchange family! Let's start exploring TalentXchange!</a>
									</div>
								</div>

								<li class="header__nav-item">
									<a class="header__nav-link" href="about.php">About Us</a>
								</li>
							</ul>

							<div class="header__actions">
								<div class="header__lang">
									<a class="header__lang-btn" href="profile.php" role="button" id="username_and_img">
									</a>
								</div>

								<a href="" id = "signinbutton" class="header__login" style="margin-left:20px">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512'
										viewBox='0 0 512 512'>
										<path
											d='M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336'
											style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
										<polyline points='288 336 368 256 288 176'
											style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
										<line x1='80' y1='256' x2='352' y2='256'
											style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
										</svg>
									<span id="status" ><?=$login_status?></span>
									<script>
										var status = document.getElementById("status").innerText;
										if (status == "Sign In"){
											document.getElementById("signinbutton").setAttribute("href", "signin.php");
										}else{
											document.getElementById("signinbutton").setAttribute("href", "process_logout.php");
										}
									</script>
								</a>
							</div>

						</div>
					</div>
				</div>
			</div>
        </div>
    
	</header>
	<!-- end header -->

	<!-- home -->
	<section class="section section--carousel section--first" data-bg="img/bg.jpg">
		<div class="container" style="margin-top: 93px;"></div>
		<div class="container" >
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap">
						<h2 class="section__title section__title--title"><b>Top Rating coaches</b> of this month</h2>
					</div>
				</div>
				<!-- end title -->
			</div>
		</div>        
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" id="top3coaches">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>     
        </div>
	</section>
	<!-- end home -->


	<!-- section -->
	<section class="section section--carousel">
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap">
						<h2 class="section__title">Latest coaches</h2>

						<!-- <div class="section__nav-wrap">
							<a href="catalog.html" class="section__view">View All</a>
						</div> -->
					</div>
				</div>
				<!-- end title -->
			</div>
		</div>
		<div class="container">
			<!-- catalog -->
			<div class="row">
				<!-- content wrap -->
				<div class="col-12">
					<!-- <style>
						img{
							height: 200px;
							width: 280px;
							background-repeat: no-repeat;
							background-position: center;
							background-size: 340px ;
						}
					</style> -->
					<div class="row" id="coach">
						
					</div>
				</div>
				<!-- end content wrap -->
			</div>
			<!-- end catalog -->	
		</div>

	</section>
	<!-- end section -->
	

	<!-- footer -->
	<footer class="footer" style="margin-top:50px">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer__navs">
						<div class="footer__nav footer__nav--1">
							<div class="footer__title"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polygon points='336 320 32 320 184 48 336 320' style='fill:none;stroke-linejoin:round;stroke-width:32px'/><path d='M265.32,194.51A144,144,0,1,1,192,320' style='fill:none;stroke-linejoin:round;stroke-width:32px'/></svg> <span>TalentXchange</span></div>

							<nav class="footer__list" >
								<a href="index.php">Explore</a>
								<a href="favourites.html">Favorites</a>
								<a href="about.php">About Us</a>
							</nav>
						</div>

					</div>
				</div>
					<div class="footer__wrap">
						<a class="footer__logo" href="index.php">
							<!-- <img src="img/talentxchange_logo.jpg" alt=""> -->
						</a>
						<span class="footer__copyright">Copyright &copy; 2020.TalentXchange All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/200918138770.htm">website template</a></span></div>
				</div>
			</div>
		</div>
	</footer>
    <!-- end footer -->
    

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   
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