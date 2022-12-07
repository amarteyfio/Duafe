<?php
//include core
include "../settings/core.php";

// Check if the user is logged in, if not then redirect to index.php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION['user_role'] != 1){
    header("Location: ../error/405.php");
    exit;
}
//include general controller
include "../controller/general_controller.php";

//include products controller
include "../controller/product_controller.php";

//get category count
$category_count = get_table_count_ctrl("categories");

//get categories

if(isset($_GET))
{
    $id = $_GET["id"];
    $product = select_product_by_id_ctrl($id);
}
else
{
    header("Location:../error/404.php");
    exit;
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/weather-icons.css" rel="stylesheet" />
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!--- SIDEBAR ---------->    
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                <div class="logo"><a href="index.php">
                            <!-- <img src="images/logo.png" alt="" /> --><span>Duafe(Admin)</span></a></div>
                    <li class="label">Main</li>
                    <li><a class="sidebar-sub-toggle" href="index.php"><i class="ti-home"></i> Dashboard <span></span>
                    </li>
                

                    <li class="label">Management</li>
                    <li><a href="categories.php"><i class="ti-menu"></i> Categories </a></li>
                    <li><a href="products.php"><i class="ti-shopping-cart"></i> Products</a></li>
                    <li><a href="artists.php"><i class="ti-user"></i> Artists</a></li>
                    <li><a href="orders.php"><i class="ti-bar-chart"></i> Orders</a></li>
                    <li><a href="../actions/logout.php"><i class="ti-power-off"></i> Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <!-- NAVBAR CONTENT -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">Administrator</span>
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / NAVBAR CONTENT -->

    <!-- Main content -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <!---Summary-->
                    
                    <!-- Summary End-->
                    <br>
                    <!-- Categories ---------------------------------------------------------------->
                <div class="row">
                    <div class="col-lg-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4><?php echo $product['product_name']; ?></h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="set_date">
                                            <div class="form-group">
                                                <label>Bid End Date</label>
                                                <input type="text" class="form-control" placeholder="Format: Y-m-d" id="date" name="date">
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label>Bid End Date</label>
                                                <input type="text" class="form-control" value = "<?php echo $id; ?>" id="id" name="id">
                                            </div>
                                            
                                            <button type="button" class="btn btn-default" id="submit">Set</button>
                                        </form>
                                        <div class="alert alert-danger" id="alert" style="display: none;">
												    
										</div>
                                        <div class="alert alert-success" id="alert2" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <!-- /# column -->
                    <!-- Categories -->
                </div>
    


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Admin Board. - Duafe
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js/lib/calendar-2/pignose.init.js"></script>


    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="js/dashboard2.js"></script>


    <!--ADD BRAND-->
    <script>

        $(document).ready(function() {
            $("#submit").click(function() {
                

                // using serialize function of jQuery to get all values of form
                var serializedData = $("#set_date").serialize();
                

                
                

                // Variable to hold request
                var request;
                // Fire off the request to process_registration_form.php
                request = $.ajax({
                    url: "http://localhost/Duafe/actions/set_auction.php",
                    type: "post",
                    data: serializedData

                });

                //console.log(serializedData);

                // Callback handler that will be called on success
                request.done(function(jqXHR, textStatus, response) {
                    
                    console.log(response.responseText);
                    //redirect if successful
                    if(response.responseText == "Success"){

                        document.getElementById('alert2').style.display = "block";
                        $("#yes").html(response.responseText);
                        window.location.replace("products.php");
                        
                    }
                    else
                    {
                      document.getElementById('alert').style.display = "block";
                      $("#alert").html(response.responseText);
                    }
                    
                });

                // Callback handler that will be called on failure
                request.fail(function(jqXHR, textStatus, errorThrown) {
                    // Log the error to the console
                    // show error
                    $("#alert").html('There is some error while submitting the data');
                    console.error(
                        "The following error occurred: " +
                        textStatus, errorThrown
                    );
                });

                return false;

            });
        });
        

    </script>
 
   </script>

</body>

</html>
