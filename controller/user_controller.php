<?php
/**
 * This code contains the controllers for the user class
 * 
 * @author Philip Amarteyfio
 * @since Novemeber 2022
 */

 //require user class
 set_include_path(dirname(__FILE__)."/../");
 require("class/user_class.php");


/* REGISTER USER CONTROLLER */

function register_user_ctrl($name,$email,$password)
{
    
    // creates new instance of user class
    $user = new user_class();

    return $user->register_user($name,$email,$password);
}



/* SELECT USER CONTROLLER */

function select_user_ctrl($id)
{

    // creates new instance of user class
    $user = new user_class();

    return $user->select_user($id);
}



/* UPDATE EMAIL CONTROLLER */

function update_email_ctrl($email,$id)
{

    // creates new instance of user class
    $user = new user_class();

    return $user->update_email($email,$id);
}


/* VERIFY USER CONTROLLER */
function verify_user_ctrl($email,$password)
{
    
    // creates new instance of user class
    $user = new user_class();

    return $user->verify_user($email,$password);
}



/* GET USER ID CONTROLLER */

function get_user_info_ctrl($email)
{
    //create new instance of user class
    $user = new user_class();

    return $user->get_user_info($email);
}



/* EMAIL EXISTS CONTROLLER */

function email_exists_ctrl($email)
{

    //creates new instance of user class
    $user = new user_class();

    return $user->email_exists($email);
}

/* GET CUSTOMER COUNT CONTROLLER */
function customer_count_ctrl()
{
    //creates new instance of user class
    $user = new user_class();

    return $user->get_customer_count();
}

/* GET CUSTOMER NAME CONTROLLER */
function get_customer_name_ctrl($id)
{
    //creates new instance of user class
    $user = new user_class();

    return $user->get_customer_name($id);
}

/* GET USER ORDERS CONTROLLER */
function get_user_orders_ctrl($id)
{
    $user = new user_class();

    return $user->get_user_orders($id);
}



?>