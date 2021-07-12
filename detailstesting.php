<?php
    require_once 'api/object/addComment.php';
	$username = $_GET['username'];
    $dao = new addComment();
	$msg = '';
	if(isset($_GET['username']) && isset($_POST['rating']) && isset($_POST['addComment'])){
		$username = $_GET['username'];
		$commenter = "YiMeng";
		$rating = $_POST['rating'];
		$description = $_POST['addComment'];
		$result = $dao->add($username, $commenter, $rating, $description);
		header("Refresh:0");
	}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
	<script src="js/usertesting.js"></script>
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<title id="username"><?php echo strtoupper($username) ?></title>
	<script src="js/chat.js"></script>
	<script src="js/google.js"></script>
	
	<style>
        #map {
            height: 400px;
		}

		#myBtn {
			display: none; /* Hidden by default */
			position: fixed; /* Fixed/sticky position */
			bottom: 20px; /* Place the button at the bottom of the page */
			left: 30px; /* Place the button 30px from the right */
			z-index: 99; /* Make sure it does not overlap */
			border: none; /* Remove borders */
			outline: none; /* Remove outline */
			background-color: red; /* Set a background color */
			color: white; /* Text color */
			cursor: pointer; /* Add a mouse pointer on hover */
			padding: 15px; /* Some padding */
			border-radius: 10px; /* Rounded corners */
			font-size: 18px; /* Increase font size */
		}

		#yBtn:hover {
			background-color: #555; /* Add a dark-grey background on hover */
		}

		input[type=number] {
			border: 2px solid lightgrey;
			border-radius: 4px;
			width:25%;
			margin-bottom:10px;
		}

		.chat_window{
			z-index: 1;
		}

		#popoverButton {
            position: fixed;
            bottom: 5px;
            right: 5px;
            width: 30%;
            border-radius: 5px;
        }

        .outer-container {
            border: 3px rgb(240, 240, 240) solid;
            width: 30%;
            position: fixed;
            bottom: 5px;
            right: 5px;
            border-radius: 5px;
            /* max-height: fit-content; */
        }

        .chat {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 5px; 
            margin: 10px ;
            position: relative;
            margin-bottom: 18px;
            
        }

        .input-group {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            margin-bottom: 40px;
            
        }

        /* Darker chat container */
        .darker {
            border-color: #ccc;
            background-color: #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px ;
        }

        /* Clear floats */
        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Style time text */
        .time-right {
            float: right;
            color: #aaa;
        }

        /* Style time text */
        .time-left {
            float: left;
            color: #999;
        }



		
    </style>

</head>
<body onload="call_user_api()">
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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
									<a class="header__lang-btn" href="profile.html" role="button" id="">
										<img src="img/cards/YiMeng.jpg" alt="">
										<!--user profile pic here -->
										<span>YiMeng</span>
									</a>
								</div>

		
								
								<a href="signin.php" class="header__login">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='288 336 368 256 288 176' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='80' y1='256' x2='352' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
									<span>Sign Out</span>
									<?php
										if( isset($success) ) {
											echo "
												<span>$success</span>
											";
											// header("Location: signout.php");
										}
										// session_unset();
									?>
					
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
	<section class="section section--first section--carousel section--bg" data-bg="img/bg.jpg" style="margin-top:70px;">
		<div class="container">
			<div class="details">
				<div class="row">
					<div class="col-xl-10">
						<div class="container" id="userInfo">
						</div>
						<div class="container" id="youtube">	
						</div>

						
							<!-- <ul class="details__stat">
								<li><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg> <b>4.7</b></li>
								<li><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M336,176h40a40,40,0,0,1,40,40V424a40,40,0,0,1-40,40H136a40,40,0,0,1-40-40V216a40,40,0,0,1,40-40h40' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='176 272 256 352 336 272' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='256' y1='48' x2='256' y2='336' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg> <b>58</b> coaches</li>
							</ul> -->
					</div>
					<!-- <div class="col-xl-2">
						<div class="details__cart">
							<div class="details__actions">
								<button class="details__buy" type="button">I want to learn this !!!</button>

								<button class="details__favorite" type="button">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>Add to favorites
								</button>
							</div>
						</div>
					</div> -->
				</div>

				<!--add google map-->
				<div class="row">
					<div class="col-12">
						<div class="details__content">
							<div class="row">
								<div class="container-fluid" style="margin-top:50px;">

									<div class="row">
							
										<!-- Map goes here -->
										<div id="map" class="col-md-6"></div>
							
										<!-- Driving Directions go here -->
										<!-- <div id="right-panel" class="col-md-6"></div> -->
							
									</div>
								</div>
							
							</div>
						</div>	
					</div>
				</div>
				<!--end of google map-->

				<div class="row"><!-- comments -->
					<div class="details__content">
						<div class="row">
							<div class="col-12 col-xl-8 order-xl-1">
								<div class="comments comments--details" style="margin-left:15px;width:120%;">
									
									<form action="detailstesting.php?username=<?= $username ?>" method="post" class="form">
										<div class="comments__title" style="font-size:10px; margin:10px;">
											<h4 >Add comment</h4>
										</div>
										Rating: 
										<input type="number" name="rating" min="1" max="5" id="rating" placeholder="Scale 1 to 5" required/> 
											
										<textarea id="addComment" name="addComment" class="form__textarea" placeholder="Add comment" required></textarea>
										<button type="submit" class="form__btn">Send</button>
									</form>
									<div class="comments__title" style="margin-top:30px;">
										<h4>Comments</h4>
										<span id="comment_no"></span>
									</div>

									<ul class="comments__list" id="comments">
										<!-- comments list-->
									</ul>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end comments -->		
		</div>
	</section>
	<!-- end section -->
	<script>
		mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		}

	</script>

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
					<div class="footer__wrap">
						<a class="footer__logo" href="index.php">
							<img src="img/talentxchange_logo.jpg" alt="">
						</a>

						<span class="footer__copyright">Copyright &copy; 2020.TalentXChange All rights reserved.<a target="_blank" href=""></a></span>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<div class="outer-container" id="chat_window" style="background-color: white; ">

        <!-- <div class="chat" style="background-color: rgb(225, 239, 245);">
            <p>Yimeng:</p>
            <p>Hello. How are you today?</p>
            <span class="time-right">11:00</span>
		</div> -->
		
		<!-- <div class="chat" style="background-color: rgb(225, 239, 245);">
            <p><b>Yimeng:</b></p>
            <p>Hi! I saw your profile as one of top rated coaches!</p>
            <span class="time-right">11:00</span>
		</div>
		
		<div class="chat" style="background-color: rgb(225, 239, 245);">
            <p><b>Yimeng:</b></p>
            <p>I am interested to learn about programming to improve my skills! Would you be interested in learning how to bake?</p>
            <span class="time-right">11:00</span>
        </div>-->

        <div id="addOn">
		</div>
		
		

        <div class="container-fluid">
            <form >
                <div class="input-group">
                    <input type="text" class="form-control" id="chat" placeholder="Send a Message!">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="sendChat()">Send</button>
                    </div>
                </div>
            </form>
        </div>

    </div>


    <button onClick="open_chat_window()" type="button" class="btn btn-secondary" id="popoverButton" data-container="body" data-toggle="popover" data-placement="top" data-content="hii">
        Chat
    </button>

	<!-- JS -->
	<!-- <script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/main.js"></script> -->

	<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs80sM_zNu31Am-DRI6n_sx1b_9CrBrjA&callback=initMap">  
    </script>


</body>
</html>