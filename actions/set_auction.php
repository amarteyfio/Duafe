<?php
//include core
include "../settings/core.php";


//include product controller
include "../controller/product_controller.php";


//include store controller
include "../controller/store_controller.php";

//error control
$err = "";

$id = $_POST['id'];
$date = $_POST['date'];

//function to checkdate
function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

//validateDate
if(validateDate($date) == false)
{
    $err = "Invalid date format";
}

$now = date("Y-m-d");

if($date < $now) {
    $err = 'date is in the past';
}

if(empty($err))
{
    //add date
    set_bid_date_ctrl($id,$date);
    echo "Success";
}
else
{
    echo $err;
}







?>