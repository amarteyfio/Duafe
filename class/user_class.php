<?php
/**
 * This class contains the functions for all users in the system.
 * 
 * @since Nov 2022
 * @author Philip Amarteyfio
 * @version 1.0
 */
 
 //include the database class
 set_include_path(dirname(__FILE__)."/../");
 include_once "settings/db_class.php";

 class user_class extends db_connection{

    /**
     * This function is used to add a user to the database
     * 
     * @author Philip Amarteyfio
     * @param name,email,age,password
     * @since Novemeber 2022
     * 
     * 
     */

    function register_user($name,$email,$password){

        //insert query
        $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
        return $this->db_query($sql);
    }

    /**
     * This function selects a user from the database using the id
     * 
     * @author Philip Amarteyfio
     * @param id
     * @since November 2022
     */
    
    function select_user($id){
        //select query
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $record = $this->db_fetch_one($sql);
        return $record;
    }

    /**
     * This function changes a users email
     * 
     * @author Philip Amarteyfio
     * @param email,id
     * @since November 2022
     */

    function update_email($email,$id){
        //update query
        $sql = "UPDATE users SET email = '$email' WHERE id = '$id'";
        return $this->db_query($sql);
    }

    /**
     * This function is used to verify a user
     * 
     * @author Philip Amarteyfio
     * @param email
     * @since November 2022
     */

    function verify_user($email,$password)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $record = $this->db_fetch_one($sql);

        //check if record is valid
        if(empty($record))
        {
            return false;
        }
        else
        {
            if(password_verify($password, $record['password']))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
            
    }

    /**
     * This function is used to get the ID of a user using their email address
     * 
     * @author Philip Amarteyfio
     * @param email
     * @since November 2022
     */

    function get_user_info($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $record = $this->db_fetch_one($sql);
        return $record;
    }

    /**
     * This function is used to check if an email address exists
     * 
     * @author Philip Amarteyfio
     * @param email
     * @since November 2022
     */

    function email_exists($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $record = $this->db_fetch_one($sql);
        
        if(empty($record))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    /**
     * This function is used to get customer count
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */
    
     function get_customer_count()
     {
        $sql = "SELECT * FROM users WHERE role = 2";
        $records = $this->db_fetch_all($sql);
        $count = 0;
        foreach($records as $record):
            $count++;
        endforeach;
        return $count;

     }
    
    
     /**
      * This function is used to get the name of a customer
      * 
      * @author Philip Amarteyfio
      * @since November 2022
      */

      function get_customer_name($id)
      {
        $sql = "SELECT name FROM users WHERE id = '$id'";
        $record = $this->db_fetch_one($sql);
        return $record['name'];
      }


      /**
       * Get a users orders
       * 
       * 
       * @author Philip Amarteyfio
       * @since November 2022
       * 
       */

       function get_user_orders($id)
       {
            $sql = "SELECT * FROM orders WHERE user_id = $id";
            $record = $this->db_fetch_all($sql);
            return $record;
       }


}


?>