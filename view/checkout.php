<?php
//include core
include "../settings/core.php";

//if not logged in
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/login.php");
    exit;
}


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

//cart items
$items = select_cart_by_users_ctrl($_SESSION['id']);

//total
$total = 0;
foreach($items as $row):
	$total = $total + intval($row['amount']);
endforeach;

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
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="../index.php">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               
               <div class="block">
                  <h4 class="widget-title">Payment</h4>
                  <p>Pay with Paystack (Secure payment)</p>
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                           <form  class="checkout-form">
                              <div class="form-group">
                                 <label for="card-number">Full Name <span class="required">*</span></label>
                                 <input class="form-control"   type="text" placeholder="" id="name">
                              </div>
                              <div class="form-group half-width padding-right">
                                 <label for="card-expiry">Email Address <span class="required">*</span></label>
                                 <input class="form-control" type="text" placeholder="name@example.com" required id="email-address">
                              </div>
							  <div class="form-group half-width padding-right">
                                 <label for="card-expiry">Amount <span class="required">*</span></label>
                                 <input id="amount" class="form-control" type="text" placeholder="" readonly value="<?php echo $total; ?>">
                              </div>
                              <button id="submit" onclick="payWithPaystack()" class="btn btn-main mt-20" type="button">Proceed</button>
                           </form>
						   <br>
						   <br>
						   <div id="error" class="alert alert-danger alert-common" style="display:none;">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
					 <?php
					  
					  foreach($items as $item):
							$prods = select_product_by_id_ctrl($item['p_id']);	
								
					 ?>		
                     <div class="media product-card">
                        <a class="pull-left" href="product-single.html">
                           <img class="media-object" src="<?php  echo $prods['product_image'];?>" alt="Image" />
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading"><a href="product-single.php?product=<?php  echo $prods['product_name'];?>"><?php  echo $prods['product_name'];?></a></h4>
                           <p class="price">GHC <?php  echo $item['amount'];?></p>
                           
                        </div>
                     </div>
					 <?php endforeach ?>
                     
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price"><?php  echo $total; ?></span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>GHC <?php  echo $total; ?></span>
                     </div>
                     <div class="verified-icon">
                        <img src="../images/R (1).png">
                     </div>
                  </div>
               </div>
            </div>
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
						<a href="contact.html">CONTACT</a>
					</li>
					<li>
						<a href="shop.html">SHOP</a>
					</li>
					<li>
						<a href="pricing.html">Pricing</a>
					</li>
					<li>
						<a href="contact.html">PRIVACY POLICY</a>
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
	<script src="https://js.paystack.co/v1/inline.js"></script> 

	<script>
    
    /* const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false); */
function payWithPaystack() {

		var amt = '<?php echo $total; ?>';
		var check = document.getElementById('amount').value;
		var em = document.getElementById('email-address').value;
		var nm = document.getElementById('name').value;
		

		//SECURITY CHECKS
		if(nm == "")
		{
			document.getElementById('error').style.display = "block";
            $("#error").html('Email is Required');
			return false;
		}
		if(em == "")
		{
			document.getElementById('error').style.display = "block";
            $("#error").html('Email is Required');
			return false;
		}

		if(amt != check)
		{
			alert('Security Breach: Amount has been changed');
			return false;
		}
		
		//SECURITY CHECKS
        event.preventDefault();
        let handler = PaystackPop.setup({

            key: 'pk_test_110ba43e9a482172973111eb66e68e2306265c16', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            currency: 'GHS',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
				document.getElementById('error').style.display = "block";
				$("#error").html('Window Closed');
            },
            callback: function(response){
            let message = 'Payment complete! Reference: ' + response.reference;
            alert(message);
            // add_payment_detail_ctrl
            email = document.getElementById("email-address").value;
            amount = document.getElementById("amount").value;
            var dataString = 'email='+ email + '&amount='+ amount;
            if (response.status=='success'){
            //alert("Please Fill All Fields");
            
            
           
            $.ajax({
            type: "POST",
            url: "../actions/process_payment.php?amt="+amount,
            data: dataString,
            cache: false,
            success: function(result){
            // alert(result);
            window.location.replace("confirmation.php");
            // window.location = "pay"
            }
            });
          }
          

            }
            

        });
        handler.openIframe();
    }
	</script>
    


  </body>
  </html>