<?php
//include core
include "../settings/core.php";


//include product controller
include "../controller/product_controller.php";

//if get
if(!isset($_GET))
{
    header("Location: ../error/404.php");
}

//get id
$id = $_GET['id'];

//delete cat
delete_product_ctrl($id);

header("Location: ../admin/products.php");


?>