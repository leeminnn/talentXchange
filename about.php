<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	</style>

	<script src='js/explore.js'></script>

	<!-- Favicons -->
	<!-- <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png"> -->

	<title>About Us</title>

	<style>
		.solution{
			color: rgb(96, 163, 153)
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


<body onload = "get_user_details()">
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
								<img src="img/talentxchange_logo.jpg" alt="" >
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


	<!-- section -->
	<section class="section section--first" data-bg="img/bg.jpg">
		<div class="container" style="margin-top: 90px;"></div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__title-wrap">
						<h2 class="section__title section__title--title"><b>About Us</b></h2>
					</div>
				</div>
			</div>
		</div> 
		<div class="container">
			<!-- article -->
			<div class="article">
				<div class="row">
					<div class="col-12">
						<!-- article content -->
						<div class="article__content article__content--page">
							<img src="img/posts/about.jpg" alt="">

							<h1>OUR MISSION</h1>

							<p>
								We aim to build a one-stop web application - a platform where one user offers his skills to teach another user, while getting the other user to coach him a skill as well. In Singapore, people have a low frequency of interactions within a community due to hectic lifestyle. Our application is an online hub for skill exchange based in the community. Through this application, a user is able to teach another user a skill or hobby while also being taught a skill or hobby by them. 
							</p>

							<h2>KEY FEATURES</h2>

							<p>
								<div style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color: grey;">We have a large pool of users and huge variety of skills set waiting for YOU to explore!</div>
								<br><br>
								<img src="img/top_coach.png">
								<img src="img/view_all.jpg">
								<br><br>
							<p>

							<p>
								<div style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color: grey;">You are also able to CUSTOMISE your favourite page to save best-loved user profiles!</div>
								<br><br>
								<img src="img/sample_fav.jpg">
								<br><br>
							<p>

							<p>
								<div style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color: grey;">You can also CHAT with users before MATCHING with them!</div>
								<br><br>
								<img src="img/chat_match.png">
								<br><br>
							<p>

							<h3>FREQUENTLY ASKED QUESTIONS</h3>

							<div>
								<h6>
									How do I create a TalentXChange account?
								</h6>
								<div class="solution">
									Click <a href="signup.php">here</a> to sign up today! Once you have signed up, you will be redirected to create your profile and you are good to go!
									<br><br>
								</div>
							</div>

							<div>
								<h6>
									Can I still sign up if i have no skills to offer?
								</h6>
								<div class="solution">
									Yes! You can still sign up for TalentXchange, but you would not be the priority user as it would be given to those who have skills to offer. However fret not as we would still try to find you matches who are willing to not be able to exchange skills!
								</div>
								<br><br>
							</div>

							<div>
								<h6>
									How do I report/block/unmatch someone?
								</h6>
								<div class="solution">
									You can block people from their profiles by clicking the three dots icon at the top of the page,
								</div>
								<br><br>
							</div> 

							<div>
								<h6>
									Where will the lessons take place?
								</h6>
								<div class="solution">
									This would be discussed between 2 users as where they would like the location to be. However for ALL minors, it has to be done online through Zoom platform which would be redirected from TalentXchange.
								</div>
								<br><br>
							</div>

							<div>
								<h6>
									I do not have the equipments, what should I do?
								</h6>
								<div class="solution">
									We do not provide sales servies. You may ask your coach to advise on how to purchase the items. 
								</div>
								<br><br>
							</div>

							
							<blockquote>
								“Anyone who stops learning is old, whether at twenty or eighty.”   —    Henry Ford.
							</blockquote>

							

							</div>
						<!-- end article content -->
					</div>
				</div>
			</div>
			<!-- end article -->

			<div class="imageSignup">
				<a href="signup.php">
					<img src="img/sign up here.jpg" style="border-radius: 30px; width: 50%; margin-left: auto; margin-right: auto; margin-top: 20px; display: block;" >
				</a>
			</div>

		</div>
	</section>
	<!-- end section -->

	<!-- section -->
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7 col-xl-8">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title">Contact form</h2>
						</div>
						<!-- end section title -->

						<div class="col-12">
							<form action="#" class="form form--contacts">
								<input type="text" class="form__input" placeholder="Name">
								<input type="text" class="form__input" placeholder="Email">
								<input type="text" class="form__input" placeholder="Subject">
								<textarea name="text" class="form__textarea" placeholder="Type your message..."></textarea>
								<button type="button" class="form__btn">Send</button>
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-5 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title">Info</h2>
						</div>
						<!-- end section title -->

						<div class="col-12">
							<p class="section__text section__text--mt">
								Operating hours:
								<br>
								Mon - Fri : 8am - 5pm
								<br>
								Sat : 8am - 12pm
								<br>
								Sun : CLOSED
							</p>

							<ul class="contacts__list">
								<li><a href="tel:+18092345678">+65 dont call us</a></li>
								<li><a href="mailto:support@gg.template">support@TalentXChange.com</a></li>
							</ul>
							<div class="contacts__social">
								<a class="fb" href="#"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z'/></svg></a>
								<a class="inst" href="#"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z'/><path d='M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z'/><path d='M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z'/></svg></a>
								<a class="tw" href="#"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z'/></svg></a>
								<a class="vk" href="#"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M484.7,132c3.56-11.28,0-19.48-15.75-19.48H416.58c-13.21,0-19.31,7.18-22.87,14.86,0,0-26.94,65.6-64.56,108.13-12.2,12.3-17.79,16.4-24.4,16.4-3.56,0-8.14-4.1-8.14-15.37V131.47c0-13.32-4.06-19.47-15.25-19.47H199c-8.14,0-13.22,6.15-13.22,12.3,0,12.81,18.81,15.89,20.84,51.76V254c0,16.91-3,20-9.66,20-17.79,0-61-66.11-86.92-141.44C105,117.64,99.88,112,86.66,112H33.79C18.54,112,16,119.17,16,126.86c0,13.84,17.79,83.53,82.86,175.77,43.21,63,104.72,96.86,160.13,96.86,33.56,0,37.62-7.69,37.62-20.5V331.33c0-15.37,3.05-17.93,13.73-17.93,7.62,0,21.35,4.09,52.36,34.33C398.28,383.6,404.38,400,424.21,400h52.36c15.25,0,22.37-7.69,18.3-22.55-4.57-14.86-21.86-36.38-44.23-62-12.2-14.34-30.5-30.23-36.09-37.92-7.62-10.25-5.59-14.35,0-23.57-.51,0,63.55-91.22,70.15-122' style='fill-rule:evenodd'/></svg></a>
							</div>
						</div>
					</div>
				</div>

			</div>
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
							<img src="img/talentxchange_logo.jpg" alt="">
						</a>
						<span class="footer__copyright">Copyright &copy; 2020.TalentXchange All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/200918138770.htm">website template</a></span></div>
				</div>
			</div>
		</div>
	</footer>
    <!-- end footer -->

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