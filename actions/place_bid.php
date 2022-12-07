<?php
//include core
include "../settings/core.php";

//include store controller
include "../controller/store_controller.php";

//include product ctrl
include "../controller/product_controller.php";

//error variables
$bid_err = "";

//Get the data
$cid = $_SESSION['id'];
$p_id = $_POST['product_id'];
$bid = $_POST['amount'];
$product = select_product_by_id_ctrl($p_id);

$buy_now = floatval($product['product_price']);
$current = floatval($product['current_bid']);
$bid = floatval($bid);
$time = $product['bid_end'];




//Validate the Bid

//ensure bid is higher than former bid by at least 10%
if($bid < ((0.10*$current) + $current))
{
    $bid_err = "Bid must be greater than previous bid by at least 10%";
}

//bid cannot be higher than buy now price
if($bid > $buy_now)
{
    $bid_err = "Bid cannot be greater than the buy now price";
}

//if bid has ended
if(strtotime('now') >= strtotime($time))
{
    $bid_err = "Bidding has ended";
}

//if there are no errors 
if(empty($bid_err))
{
    
    //function to add bid
    add_bid_ctrl($cid,$p_id,$bid); 

    //function to set current bid 
    update_bid_ctrl($p_id,$bid);

    echo "Success";

    
}
else
{
    echo $bid_err;
}

?>