<?php
// Turn on error reporting
error_reporting(E_ALL);

// Display errors on screen
ini_set('display_errors', 'On');

//include core
include "settings/core.php";

//include store_controller
include "controller/store_controller.php";


//include general controller
include "controller/general_controller.php";

//include product controller
include "controller/product_controller.php";

//inlcude auction checker
include "actions/auction_checker.php";



/* FOR IF USER IS LOGGED IN */
$message = '<li><a href="login/login.php">Login</a></li>'; //Account Navabar dropdown list

$name = ''; //Account Name

//check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $message = '<li><a href="actions/logout.php">Log Out</a></li>
				<li><a href="view/profile-details.php">Profile</a></li>';

	$name = $_SESSION["user_name"];
}

/* SELECT INFORMATION FROM DATABASE */

//new producs
$arrivals = get_new_products_ctrl();



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
  <title>Duafe-Home</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<!-- Start Top Header Bar -->
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
					<a href="index.php">
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
						<a href="view/cart.php" class="" data-toggle="" data-hover=""><i
								class="tf-ion-android-cart"></i>Cart</a>
						

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="view/search_results.php" method="POST"><input type="text"  class="form-control" placeholder="Search..." name="term"><button type="submit" name="search" style="display: none;"></button></form>
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


<!-- Main Menu Section -->
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
						<a href="index.php">Home</a>
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
										<li><a href="view/category.php?category=Painting">Painting</a></li>
										<li><a href="view/category.php?category=Digital">Digital Art</a></li>
										<li><a href="view/category.php?category=Crafts">Crafts</a></li>
									</ul>
								</div>

								<!-- Layout -->
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">View</li>
										<li role="separator" class="divider"></li>
										<li><a href="view/shop-sidebar.php">All Products</a></li>
										<li><a href="#new">Arrivals</a></li>
										<li><a href="view/faq.php">FAQ</a></li>

									</ul>
								</div>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->

					<!-- About -->
					<li class="dropdown ">
						<a href="view/about.php">About</a>
					</li><!-- / About -->

					<!-- Contact -->
					<li class="dropdown ">
						<a href="view/contact.php">Contact</a>
					</li><!-- / Contact -->


					<!-- Artists -->
					<li class="dropdown ">
						<a href="view/artists.php">Artists</a>
					</li><!-- / Artists -->

				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>

<div class="hero-slider">
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/sliders/slider-2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">BEAUTY</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="view/shop-sidebar.php">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/sliders/slider-3.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-left">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">LOVE</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Art <br> is a form of love.</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="view/shop-sidebar.php">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/sliders/steve-johnson.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-right">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">SOUL</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Decorate your space <br> with art for your soul</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="view/shop-sidebar.php">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="product-category section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title text-center">
					<h2>Categories</h2>
				</div>
			</div>
			<div class="col-md-6">
				<div class="category-box">
					<a href="view/category.php?category=Crafts">
						<img src="images/category/erol-ahmed-_CeW6TRUWws-unsplash.jpg" alt="Crafts" />
						<div class="content">
							<h3 style="color: white;">Crafts</h3>
							<p>Handcrafted Elegance</p>
						</div>
					</a>	
				</div>
				<!-- For Each -->
				<div class="category-box">
					<a href="view/category.php?category=Painting">
						<img src="images/category/steve-johnson.jpg" alt="Painting" />
						<div class="content">
						<h3 style="color: white;">Painting</h3>
							<p>Magic on Canvas</p> 
							
						</div>
					</a>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="category-box category-box-2">
					<a href="view/category.php?category=Digital">
						<img src="images/category/digital.jpg" alt="Digital Art" />
						<div class="content"> 
							<h3 style="color: white;">Digital Art</h3>
							<p>Experience Afrofuturism</p>              
						</div>
					</a>	
				</div>
			</div>
		</div>
	</div>
</section>

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center" id="new">
				<h2>New Arrivals</h2>
			</div>
		</div>
		<div class="row">
			<!-- FOR EACH LOOP -->
			<?php foreach($arrivals as $row): ?>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<!--<span class="bage">Sale</span>--->
						<img class="img-responsive" src="<?php 
						 $img = $row['product_image'];
						 $rem = "../";
						 $img = str_replace($rem, "", $img);
						 echo $img;
						
						?>" alt="product-img" style="width: 400px; height:400px;" />
						<div class="preview-meta">
							<ul>
								
								<li>
			                        <a href="view/product-single.php?product=<?php echo $row['product_name']; ?>" ><i class="tf-ion-ios-search-strong"></i></a>
								</li>
								
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="view/product-single.php?product=<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a></h4>
						<p class="price" style="font:13px;">Starting From GHC <?php echo $row['current_bid']; ?></p>
						<p><small>Ending on <?php echo $row['bid_end']; ?></small></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			<!--END FOR EACH LOOP -->
			
		
		<!-- Modal -->
		<!--<div class="modal product-modal fade" id="product-">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i class="tf-ion-close"></i>
			</button>
		  	<div class="modal-dialog " role="document">
		    	<div class="modal-content">
			      	<div class="modal-body">
			        	<div class="row">
			        		<div class="col-md-8 col-sm-6 col-xs-12">
			        			<div class="modal-image">
				        			<img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
			        			</div>
			        		</div>
			        		<div class="col-md-4 col-sm-6 col-xs-12">
			        			<div class="product-short-details">
			        				<h2 class="product-title"></h2>
			        				<p class="product-price">GHC</p>
			        				<p class="product-short-description">
			        					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
			        				</p>
			        				<a href="cart.html" class="btn btn-main">Add To Cart</a>
			        				<a href="product-single.html" class="btn btn-transparent">View Product Details</a>
			        			</div>
			        		</div>
			        	</div>
			        </div>
		    	</div>
		  	</div>
		</div> 
		
		< /.modal --> 

		</div>
	</div>
</section>


<!--
Start Call To Action
==================================== -->
<section class="call-to-action bg-gray section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="title">
					<h2>SUBSCRIBE TO NEWSLETTER</h2>
					<p>Recieve daily updates on products <br> Become an exclusisve member</p>
				</div>
				<div class="col-lg-6 col-md-offset-3">
				    <div class="input-group subscription-form">
				      <input type="text" class="form-control" placeholder="Enter Your Email Address">
				      <span class="input-group-btn">
				        <button class="btn btn-main" type="button">Subscribe Now!</button>
				      </span>
				    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->

			</div>
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<section class="section instagram-feed">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>View us on instagram</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
			</div>
		</div>
	</div>
</section>


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
						<a href="view/contact.php">CONTACT</a>
					</li>
					<li>
						<a href="view/shop-sidebar.php">SHOP</a>
					</li>
					
					<li>
						<a href="view/about.php">PRIVACY POLICY</a>
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
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>
