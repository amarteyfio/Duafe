<?php
//include core
include "../settings/core.php";

//include product controllers
include "../controller/product_controller.php";

//Get the Data
$category = $_POST['category'];

$cat_err = "";

//Check if the category is empty
if(empty(trim($category))){
    $cat_err = "Please enter a category";
}

//Check if the category exists
if(category_check_ctrl($category) == false)
{
    $cat_err = "Category already exists";
}

//Check if the category is valid
if(preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/",$category) == 0)
 {
    $cat_err = "enter a valid  category name";
    
 }

//if there are no errors
if(empty($cat_err))
{
    add_category_ctrl($category);
    echo "Success";
}
?>