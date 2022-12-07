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

//get product 
if(isset($_GET))
{
$product = get_product_by_name_ctrl(urldecode($_GET['product']));
}

if(empty($product)){
	header("Location: ../error/404.php");
}

//echo $product['product_name'];

//get related products
$similar_products = select_similar_products_ctrl($product['category_id'], $product['product_id']);

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
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="shop.html">Shop</a></li>
					<li class="active">Single Product</li>
				</ol>
			</div>
			
		</div>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='<?php echo $product['product_image']; ?>' alt='' data-zoom-image="<?php echo $product['product_image']; ?>" />
								</div>
								
								
							</div>
							
							<!-- sag sol -->
							<!--<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
								<i class="tf-ion-ios-arrow-right"></i>
							</a>-->
						</div>
						
						<!-- thumb -->
						<!--<ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img src='images/shop/single-products/product-1.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='1'>
								<img src='images/shop/single-products/product-2.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='2'>
								<img src='images/shop/single-products/product-3.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='3'>
								<img src='images/shop/single-products/product-4.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='4'>
								<img src='images/shop/single-products/product-5.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='5'>
								<img src='images/shop/single-products/product-6.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='6'>
								<img src='images/shop/single-products/product-7.jpg' alt='' />
							</li>
						</ol>-->
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2><?php echo $product['product_name']; ?></h2>
					<p class="product-price">Buy now: GHC<?php echo $product['product_price']; ?></p>
					
					<p class="product-description mt-20">
					<?php echo $product['description']; ?>
					</p>
					<p>By: <?php echo get_artist_name_ctrl($product['artist_id']);?></p>
					
					<!--<div class="color-swatches">
						<span>color:</span>
						<ul>
							<li>
								<a href="#!" class="swatch-violet"></a>
							</li>
							<li>
								<a href="#!" class="swatch-black"></a>
							</li>
							<li>
								<a href="#!" class="swatch-cream"></a>
							</li>
						</ul>
					</div>-->
					<div class="product-category">
						<span>Categories:</span>
						<ul>
							<li><a href="category.php?category=<?php echo get_category_name_ctrl($product['category_id']); ?>"><?php echo get_category_name_ctrl($product['category_id']); ?></a></li>
							
						</ul>
					</div>
					<br>
					<div >
						<span>Current Bid:</span>
						<div>
							<p><?php echo $product['current_bid']; ?></p>
						</div>
					</div>
					<button class="btn btn-main mt-20" id="buy_now">Buy Now(GHC<?php echo $product['product_price']; ?>)</button>  <a data-toggle="modal" data-target="#coupon-modal" href="#!" class="btn btn-main mt-20">Place Bid</a>
					<br><br>
					<div id="error" class="alert alert-danger alert-common" style="display:none;">

					</div>
					<div id="success" class="alert alert-success alert-common" style="display: none;">

					</div>
				</div>
			</div>
		</div>
		<!--<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews (0)</a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h4>Product Description</h4>
							<p><?php //echo $product['description']; ?></p>
							
						</div>
						<div id="reviews" class="tab-pane fade">
							<div class="post-comments">
						    	<ul class="media-list comments-list m-bot-50 clearlist">
								    
								     Comment Item start
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="images/blog/avater-1.jpg" alt="" width="50" height="50">
								        </a>

								        <div class="media-body">

								            <div class="comment-info">
								                <div class="comment-author">
								                    <a href="#!">Jonathon Andrew</a>
								                </div>
								                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
								                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
								            </div>

								            <p>
								                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
								            </p>

								        </div>

								    </li>
									comment -->
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="products related-products section">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Related Products</h2>
			</div>
		</div>
		<div class="row">
			<?php foreach($similar_products as $prod): ?>
			<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
						
						<img class="img-responsive" src="<?php echo $prod['product_image']; ?>" alt="product-img" />
						<div class="preview-meta">
							<ul>
							<li>
			                        <a href="product-single.php?product=<?php echo $prod['product_name']; ?>" ><i class="tf-ion-ios-search-strong"></i></a>
							</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.php?product=<?php echo $prod['product_name']; ?>"><?php echo $prod['product_name']; ?></a></h4>
						<p class="price">Starting from <?php echo $prod['current_bid']; ?></p>
						<p><small>Ending on <?php echo $prod['bid_end']; ?></small></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>




<!-- Modal -->
<div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <form id = "bid">
                  <div class="form-group">
                     <input class="form-control" type="number" placeholder="Enter an amount" id = "amt">
                  </div>
                  <button type="button" class="btn btn-main" id="bid">Bid</button>
               </form>
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
    <!-- Video Lightbox ../plugin -->
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

	<!----BUY NOW-->
	<script>
                $(document).ready(function() {
            $("#buy_now").click(function() {

                // using serialize function of jQuery to get all values of form
                var product_id = <?php echo $product['product_id'];?>
				

                // Variable to hold request
                var request;
                // Fire off the request to process_registration_form.php
                request = $.ajax({
                    url: "https://duafe-auction.herokuapp.com/actions/add_to_cart.php",
                    type: "post",
                    data: {product_id:product_id}
                });

                //console.log(serializedData);

                // Callback handler that will be called on success
                request.done(function(jqXHR, textStatus, response) {
                    
                    console.log(response.responseText);
                    //redirect if successful
                    if(response.responseText == "Success")
					{

                        document.getElementById('success').style.display = "block";
                        $("#success").html(response.responseText);
						window.location.replace("cart.php");
                        
                    }
                    
                    else
                    {
                      document.getElementById('error').style.display = "block";
                      $("#error").html(response.responseText);
                    }
                    
                });

                // Callback handler that will be called on failure
                request.fail(function(jqXHR, textStatus, errorThrown) {
                    // Log the error to the console
                    // show error
                    $("#error").html('There is some error while submitting the data');
                    console.error(
                        "The following error occurred: " +
                        textStatus, errorThrown
                    );
                });

                return false;

            });
        });
        
 </script>
    <!----BUY NOW-->

	<!--- BID --->
	<script>
                $(document).ready(function() {
            $("#bid").click(function() {

                // using serialize function of jQuery to get all values of form
                var product_id = <?php echo $product['product_id'];?>;
				var amount = document.getElementById('amt').value

				

                // Variable to hold request
                var request;
                // Fire off the request to process_registration_form.php
                request = $.ajax({
                    url: "https://duafe-auction.herokuapp.com/actions/place_bid.php",
                    type: "post",
                    data: {product_id:product_id,amount:amount}
                });

                //console.log(serializedData);

                // Callback handler that will be called on success
                request.done(function(jqXHR, textStatus, response) {
                    
                    console.log(response.responseText);
                    //redirect if successful
                    if(response.responseText == "Success")
					{
						
                        document.getElementById('success').style.display = "block";
                        $("#success").html('Bid Made Success Fully <br> Item will be automatically added to your cart if you win! <br> Good Luck!');
						window.location.reload();
                        
                    }
                    
                    else
                    {
					  
                      document.getElementById('error').style.display = "block";
                      $("#error").html(response.responseText);
                    }
                    
                });

                // Callback handler that will be called on failure
                request.fail(function(jqXHR, textStatus, errorThrown) {
                    // Log the error to the console
                    // show error
                    $("#error").html('There is some error while submitting the data');
                    console.error(
                        "The following error occurred: " +
                        textStatus, errorThrown
                    );
                });

                return false;

            });

			

        });        
 </script>


  </body>
  </html>