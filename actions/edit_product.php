<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
}

//require controller
require "../controller/product_controller.php";

$category = $_POST['category'];
$artist = $_POST['artist'];
$prod_name = $_POST['p_name'];
$price = $_POST['price'];
$bid = $_POST['bid'];
$desc = $_POST['desc'];
$keywords = $_POST['keyword'];
$id = $_POST['id'];


edit_product_ctrl($id,$category, $artist, $prod_name, $price, $bid,$keywords,$desc);
echo "Success";


?>