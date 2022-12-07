<?php
//include core
include "../settings/core.php";

//include product class
include '../controller/product_controller.php';

//include general controller
include "../controller/general_controller.php";

//includ store controller
include "../controller/store_controller.php";

//include auction checker
include "../settings/auction_checker.php";


/* FOR IF USER IS LOGGED IN */
$message = '<li><a href="../login/login.php">Login</a></li>'; //Account Navabar dropdown list

$name = ''; //Account Name

//check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $message = '<li><a href="../actions/logout.php">Log Out</a></li>
				<li><a href="profile-details.php">Profile</a></li>';

	$name = $_SESSION["user_name"];
}


?>
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="../plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="../plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="../plugins/slick/slick.css">
  <link rel="stylesheet" href="../plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../css/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="body">

<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>020-214-5735</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="../index.php">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">DUAFE</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="cart.php" class="" data-toggle="" data-hover=""><i
								class="tf-ion-android-cart"></i>Cart</a>
						

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
						<li>
								<form action="search_results.php" method="POST"><input type="text"  class="form-control" placeholder="Search..." name="term"><button type="submit" name="search" style="display: none;"></button></form>
							</li>
						</ul>
					</li><!-- / Search -->

					<!-- User --->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"><?php echo $name; ?></i><span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<?php echo $message; ?>
							
						</ul>
					</li> <!--User -->

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="../index.php">Home</a>
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="view/shop-sidebar.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Categories</li>
										<li role="separator" class="divider"></li>
										<!-- INSERT FOR EACH HERE -->
										<li><a href="category.php?category=Painting">Painting</a></li>
										<li><a href="category.php?category=Digital">Digital Art</a></li>
										<li><a href="category.php?category=Crafts">Crafts</a></li>
									</ul>
								</div>

								<!-- Layout -->
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">View</li>
										<li role="separator" class="divider"></li>
										<li><a href="shop-sidebar.php">All Products</a></li>
										<li><a href="faq.php">FAQ</a></li>

									</ul>
								</div>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->

					<!-- About -->
					<li class="dropdown ">
						<a href="about.php">About</a>
					</li><!-- / About -->

					<!-- Contact -->
					<li class="dropdown ">
						<a href="contact.php">Contact</a>
					</li><!-- / Contact -->


					<!-- Artists -->
					<li class="dropdown ">
						<a href="artists.php">Artists</a>
					</li><!-- / Artists -->

				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">About Us</h1>
					<ol class="breadcrumb">
						<li><a href="../index.php">Home</a></li>
						<li class="active">about us</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img class="img-responsive" src="../images/about/slider-2.jpg">
			</div>
			<div class="col-md-6">
				<h2 class="mt-40">About Our Shop</h2>
				<p>Duafe is an innovative art auction business in Ghana that offers art enthusiasts the ability to bid on and purchase unique, high-quality pieces from</p>
				<p>a curated selection of local artists. With Duafe, customers can participate in auctions or choose to immediately purchase their desired artwork at a fixed price. This flexibility allows customers to find the perfect piece</p>
				<p>at a price that works for them. Additionally, Duafe's focus on supporting local artists and showcasing diverse perspectives sets it apart from other art auction businesses in Ghana. Choose Duafe for a unique and fulfilling art-buying experience</p>
			</div>
		</div>
		<div class="row mt-40">
			<div class="col-md-3 text-center">
				<img src="../images/about/awards-logo.png">
			</div>
			<div class="col-md-3 text-center">
				<img src="../images/about/awards-logo.png">
			</div>
			<div class="col-md-3 text-center">
				<img src="../images/about/awards-logo.png">
			</div>
			<div class="col-md-3 text-center">
				<img src="../images/about/awards-logo.png">
			</div>
		</div>
	</div>
</section>
<section class="team-members ">
	<div class="container">
		<div class="row">
			<div class="title"><h2>Team Members</h2></div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="team-member text-center">
					<img class="img-circle" src="images/team/team-1.jpg">
					<h4>Philip Amarteyfio</h4>
					<p>Founder</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="team-member text-center">
					<img class="img-circle" src="images/team/team-2.jpg">
					<h4>Philip Amarteyfio</h4>
					<p>Developer</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="team-member text-center">
					<img class="img-circle" src="images/team/team-3.jpg">
					<h4>Philip Amarteyfio</h4>
					<p>Shop Manager</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="team-member text-center">
					<img class="img-circle" src="images/team/team-1.jpg">
					<h4>Philip Amarteyfio</h4>
					<p>Shop Manager</p>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="section video-testimonial bg-1 overly-white text-center mt-50">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Video presentation</h2>
				<a class="play-icon" href="https://www.youtube.com/watch?v=oyEuk8j8imI&amp;rel=0" data-toggle="lightbox">
					<i class="tf-ion-ios-play"></i>
				</a>
			</div>
		</div>
	</div>
</div>



<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com/themefisher">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/themefisher">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://www.twitter.com/themefisher">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="https://www.pinterest.com/themefisher/">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="contact.php">CONTACT</a>
					</li>
					<li>
						<a href="shop-sidebar.php">SHOP</a>
					</li>
					
					<li>
						<a href="about.php">PRIVACY POLICY</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></p>
			</div>
		</div>
	</div>
</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="../plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="../plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="../plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="../plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="../plugins/slick/slick.min.js"></script>
    <script src="../plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="../plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="../js/script.js"></script>
    


  </body>
  </html>