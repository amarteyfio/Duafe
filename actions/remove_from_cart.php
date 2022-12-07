<?php 

//include core
include "../settings/core.php";

//include store controller
include "../controller/store_controller.php";

if(!isset($_GET))
{
    header("Location: ../error/404.php");
}

//get the data
$cid = $_SESSION['id'];
$pid = $_GET['p_id'];


//delete
cart_remove_ctrl($pid, $cid);

//return
header("Location: ../view/cart.php");







?>
