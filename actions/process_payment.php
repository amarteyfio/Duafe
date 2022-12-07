<?php
//include store controller
include '../controller/store_controller.php';

session_start();

$cid = $_SESSION['id'];
$amt = $_GET['amt'];


$email = $_POST['email'];
$amount = $_POST['amount'];


$url = "https://api.paystack.co/transaction/initialize";
$fields = [
  'email' => $email,
  'amount' => $amount
  
];
$fields_string = http_build_query($fields);
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Authorization: Bearer sk_test_2b5213ed93674853627d00c1c7f44f22daec14c1",
  "Cache-Control: no-cache",
));

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);


/**ORDER AND PAYMENT */

//new order
$invoice = mt_rand(100000,999999);//invoice
$date = date("Y-m-d");
//add order
$o = ord_ctr($cid,$invoice,$date);

$ord = ord_sel_ctr();
$o_id = $ord['order_id'];

if($o){
//mark item as purchased
mark_purchased_ctrl($cid);

//remove from user cart
remcart_ctr($cid);

//remove from all carts
remove_from_all($cid);

payment_ctr($amt,$cid,$o_id,$date);
}
else{
    echo "Something Went Wrong!";
}





?>
