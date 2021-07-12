<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile Page</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/paymentfont.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="css/profile.css">

</head>
<?php
	require_once 'api/include/common.php';
	require_once 'api/object/info.php';
	include_once 'api/config/database.php';


    if( !isset($_SESSION['username']) ) {
        header('Location: signin.php');
        return;
    }

	$username = ucwords($_SESSION['username']);

	?>
<body onload="get_user_details()">
	<!-- header -->
	<span id="username" style="display:none"><?=$username?></span>
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
									<a class="header__nav-link" href="favorites.html">Favorites</a>
								</li>

								<li class="header__nav-item">
									<a class="header__nav-link">Notification</a>
								</li>

								<li class="header__nav-item">
									<a class="header__nav-link" href="about.html">About Us</a>
								</li>
							</ul>

							<div class="header__actions">
								<div class="header__lang">
									<a class="header__lang-btn" href="profile.php" role="button" id="username_and_img">
										<!--user profile pic here -->
									</a>
								</div>

								<a href="signin.php" class="header__login" style="margin-left:20px">
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
									<span>Sign out</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
	<!-- end header -->
	<div class="main-content">

		<!-- Header -->
		<div class="pt-5 pt-lg-8 d-flex align-items-center">
		</div>
		<!-- Page content -->
		<div class="container-fluid mt--7">
			<div class="row">
				<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
					<div class="card card-profile shadow">
						<div class="row justify-content-center">
							<!-- <div class="col-lg-3 order-lg-2"> -->
								<div class="card-profile-image">
									<a>
										<span id="img"></span>
									</a>
								</div>
							<!-- </div> -->
						</div>
						<div class="card-body pt-0 pt-md-4">
							<div class="row">
								<div class="col">
									<div class="card-profile-stats d-flex justify-content-center mt-md-5">
										<div>
											<span class="heading">0</span>
											<span class="description">Friends</span>
										</div>
										<div>
											<span class="heading">0</span>
											<span class="description">Photos</span>
										</div>
										<div>
											<span class="heading">0</span>
											<span class="description">Comments</span>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center">
								<h3>
								<?= $username ?><span class="font-weight-light"></span>, <span id="age"></span>
								</h3>
								<div class="h5 font-weight-300">
									<i class="ni location_pin mr-2"><span id="reg"></span>, <span id="cty"></span></i>
								</div>
								<div class="h5 mt-4">
									<i class="ni business_briefcase-24 mr-2"></i><span id="occ"></span>
								</div>
								<div>
									<i class="ni education_hat mr-2"></i><span id="prevsch"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 order-xl-1">
					<div class="card bg-secondary shadow">
						<div class="card-header bg-white border-0">
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">My account</h3>
								</div>
							</div>
						</div>
						<div class="card-body">
							<form action="process_edit.php" method="GET">
								<h6 class="heading-small text-muted mb-4">User information</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group focused">
												<label class="form-control-label">Username</label>
												<input disabled type="text" id="input-username"
													class="form-control form-control-alternative" 
													placeholder="Username"
													value=<?= $username ?>>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label">Email
													address</label>
												<input type="email" id="email"
													class="form-control form-control-alternative"
                                                    placeholder="abc@example.com"
                                                    name="email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group focused">
												<label class="form-control-label">First
													name</label>
												<input type="text" id="firstname"
													class="form-control form-control-alternative"
                                                    placeholder="First name"
                                                    name="firstname">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group focused">
												<label class="form-control-label">Last
													name</label>
												<input type="text" id="lastname"
													class="form-control form-control-alternative"
                                                    placeholder="Last name"
                                                    name="lastname">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group focused">
												<label class="form-control-label">Occupation</label>
												<input type="text" id="occupation"
                                                    class="form-control form-control-alternative" placeholder="Occupation"
                                                    name="occupation">
													
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group focused">
												<label class="form-control-label">Graduated From</label>
												<input type="text" id="prevschool"
                                                    class="form-control form-control-alternative" placeholder="Graduated From" name="prevschool">	
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4">
								<!-- Address -->
								<h6 class="heading-small text-muted mb-4">Contact information</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group focused">
												<label class="form-control-label">Address</label>
												<input id="addr" class="form-control form-control-alternative"
													placeholder="Home Address"
                                                    type="text"
                                                    name="addr">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group focused">
												<label class="form-control-label">Region</label>
												<input type="text" id="region"
                                                    class="form-control form-control-alternative" placeholder="Region"
                                                    name="region">
													
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group focused">
												<label class="form-control-label">Country</label>
												<input type="text" id="country"
													class="form-control form-control-alternative" placeholder="Country" name="country">
													
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label class="form-control-label">Postal
													code</label>
												<input type="text" id="postal"
													class="form-control form-control-alternative"
													placeholder="Postal code" name="postal">
													
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4">
								<h6 class="heading-small text-muted mb-4">Skills</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group focused">
												<label class="form-control-label">Skills</label>
												<input type="text" id="skill"
													class="form-control form-control-alternative" placeholder="skill" name="skill">
											</div>
										</div>
									</div>
								</div>
								<!-- Description -->
								<hr class="my-4">
								<h6 class="heading-small text-muted mb-4">About Me</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group focused">
												<label class="form-control-label">About Me</label>
												<textarea rows="2" class="form-control form-control-alternative"
													placeholder="A few words about you ..." id="bio" name="bio"></textarea>
											</div>
										</div>
									</div>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Done">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="footer__wrap">
					<a class="footer__logo" href="index.php">
						<img src="img/talentxchange_logo.jpg" alt="">
					</a>

					<span class="footer__copyright">Copyright &copy; 2020.TalentXChange All rights reserved.<a
							target="_blank" href=""></a></span>
				</div>
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
<script src="js/user.js"></script>
</body>

</html>