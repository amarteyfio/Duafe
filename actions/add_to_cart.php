<?php
//include core
include "../settings/core.php";

//include
include "../controller/store_controller.php";

//include product
include  "../controller/product_controller.php";

$err = "";

//if not logged in
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    echo "You are not logged in";
    exit();
}
//error


//get product_id
$p_id = $_POST['product_id'];

//get amount
$prod = select_product_by_id_ctrl($p_id);
$amt = $prod['product_price'];

//check if product has already been added to cart
if(check_item_in_cart_ctrl($p_id,$_SESSION['id']) == true)
{
    $err = "Item Added Already";
}

//add product to cart
if(empty($err))
{
    add_to_cart_ctrl($p_id,$_SESSION['id'],$amt);

    echo "Success";  
}
else
{
    echo $err;
}





?>