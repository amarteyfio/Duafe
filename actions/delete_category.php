<?php
//include core
include "../settings/core.php";


//include product controller
include "../controller/product_controller.php";

//get id
$cat_id = $_GET['id'];

//delete cat
delete_category_ctrl($cat_id);

header("Location: ../admin/categories.php");



?>