<?php
/**
 * This code registers a user into the database
 * 
 * @author Philip Amarteyfio
 */
 
 //require user controller
 require('../controller/user_controller.php');

 /* Error Control Variables */
 $name_err = "";
 $email_err = ""; 
 $password_err = "";


 /* Get the Data */
 
 $name = trim($_POST['name']); //name
 $email = trim($_POST['email']); //email
 $password = trim($_POST['password']); //password
 $password_confirmation = trim($_POST['password_confirmation']); //password_confirmation
 
 


 /* Validate Name */

//if name is empty
 if(empty($name)){
    $name_err = "Please enter a name";
    

 }

 if(preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/",$name) == 0)
 {
    $name_err = "enter a valid name";
    
 }
 

 /* Validate Email */

 //if email is empty
 if (empty(trim($email)))
 {
    $email_err = "Please enter an email";
    
 }

 //check email format
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
 {
    $email_err = "Invalid email format";
    
    
 }

 //check if email already exists
 if(email_exists_ctrl($email) == false)
 {
    $email_err = "This email is already registered";
    
 }

 /* Validate Password */

 //if password is empty
 if (empty(trim($password)))
  {
    $password_err  = "Please enter a password";
    
  }

  //Check if passwords match
  if(empty($password_err) && ($password != $password_confirmation))
  {
    $password_err = "Password did not match.";
    
  }

  //Check that there are no errors
  if(empty($name_err) && empty($email_err) && empty($password_err))
  {  
    //hash password
    $password = password_hash($password,PASSWORD_DEFAULT);


    //register user
    register_user_ctrl($name,$email,$password);

    //send success message
    print "Success";
  }
  else
  {
      print "Error: <br>".$email_err."<br>".$name_err."<br>".$password_err;
  }

 


 

?>