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

//ERROR VARIABLES
$name_err = "";
$price_err = "";
$bid_err = "";
$desc_err = "";
$cat_err = "";
$art_err = "";
$img_err = "";


//GET THE DATA
if(isset($_POST['submit'])){
$category = $_POST['category'];
$artist = $_POST['artist'];
$prod_name = $_POST['p_name'];
$price = $_POST['price'];
$bid = $_POST['bid'];
$desc = $_POST['desc'];
$keywords = $_POST['keyword'];

//VALIDATE DATA

//validate product name
if(empty(trim($prod_name)))
{
    $name_err = "Please insert product name.";
}


if(preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/",$prod_name) == 0)
 {
    $name_err = "enter a valid name";
    
 }

 //validate price
 if(empty(trim($price)))
 {
    $price_err = "Please enter a valid price";
 }

 if(preg_match("/^[0-9]\d{0,9}(\.\d{1,3})?%?$/",$price) == 0)
 {
    $price_err = "Enter price as integer or decimal";
 }

 //validate bid
 if(empty(trim($bid)))
 {
    $bid_err = "Please enter a valid bid";
 }

 if(preg_match("/^[0-9]\d{0,9}(\.\d{1,3})?%?$/",$bid) == 0)
 {
    $bid_err = "Enter price as integer or decimal";
 }

 //validate description
 if(empty(trim($desc)))
 {
    $desc_err = "Please enter a valid description";
 }


 //validate artist
if(empty(trim($artist)))
{
     $art_err = "Please enter a valid artist";
}

//validate category
if(empty(trim($category)))
{
    $cat_err = "Please enter a valid category";
}


//IMAGE UPLOAD

$targetDir = "../images/product/";
$fileName = $_FILES["image"]["name"];
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

//validate image format
 if($fileType!= "jpeg" && $fileType!= "png" && $fileType!= "gif" && $fileType!= "jpg")
 {
    $img_err = "Please enter a valid image format i.e PNG or JPEG";
 }


 //IF THERE ARE NO ERRORS
 if($name_err == "" && $price_err == "" && $bid_err == "" && $desc_err == "" && $cat_err == "" && $art_err == "" && $img_err == "")
 {
    add_product_ctrl($category,$artist,$prod_name,$price,$bid,$targetFilePath,$desc,$keywords);
    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/product/".$fileName);
    echo "Success";
    header("Location: ../admin/products.php");
 }
 else
 {
    print "Error: <br>".$name_err."<br>".$price_err."<br>".$bid_err."<br>".$desc_err."<br>".$cat_err."<br>".$art_err."<br>".$img_err;
 }

}       
        

       


        

        //--FILE UPLOAD--//
        

    


?>


