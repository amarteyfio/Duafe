<?php
/**
 * This file contains the functions for the store 
 * 
 * @author Philip Amarteyfio
 * @since November 2022
 * @version 1.0
 * 
 */

 //include db class
 set_include_path(dirname(__FILE__)."/../");
 include_once "settings/db_class.php";


 class store_class extends db_connection
 {
    /**
     * This function gets the number of orders made
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */

    function get_order_count()
     {
        $sql = "SELECT * FROM orders";
        $records = $this->db_fetch_all($sql);
        $count = 0;

        foreach($records as $record):
            $count++;
        endforeach;

        return $count;
        
     }


     /**
     * This function gets the number of adds and item to cart
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */

     function add_to_cart($p_id,$c_id,$amt)
     {
        $sql = "INSERT INTO cart (p_id,c_id,amount) VALUES ('$p_id','$c_id','$amt')";
        return $this->db_query($sql);
     }


     /**
     * This function checks if an item is in cart
     * 
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */

    function check($p_id,$c_id){
        $sql = "SELECT * FROM cart WHERE p_id = $p_id AND c_id = $c_id";
        $items = $this->db_fetch_all($sql);

        //if empty
        if(empty($items) == false){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * This function removes selects all items in a users cart
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */

     function select_cart_by_user($c_id)
     {
        $sql = "SELECT * FROM cart WHERE c_id = '$c_id'";
        $items = $this->db_fetch_all($sql);
        return $items;
        
     }


     //REMOVE FROM CART
    function cart_remove($pid,$cid){
        $sql = "DELETE FROM cart WHERE p_id = $pid AND c_id = $cid";
        return $this->db_query($sql);
    }

    //New order
    function ord($cid,$inv,$date){
        $sql = "INSERT INTO orders (user_id,invoice_no,order_date,order_status) VALUES ('$cid','$inv','$date','SUCCESS')";
        return $this->db_query($sql);
    }

    //add payment 
    function payment($amt,$c_id,$oid,$date){
        $sql = "INSERT INTO payment (amount,user_id,order_id,currency,payment_date) VALUES ('$amt','$c_id','$oid','GHS','$date')";
        return $this->db_query($sql);
    }

    function ord_sel(){
        $sql = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1";
        return $this -> db_fetch_one($sql);
    }

    //remove from cart
    function remcart($cid)
    {
        $sql = "DELETE FROM cart WHERE c_id = $cid";
        return $this->db_query($sql);
    }

    //mark product as purchased
    function mark_purchased($cid)
    {
        $sql = "SELECT * FROM cart WHERE c_id = $cid";
        $record = $this->db_fetch_all($sql);

        foreach ($record as $row):
            $id = $row['p_id'];
            $sql = "UPDATE products SET product_status = 1 WHERE product_id = $id";
            $this->db_query($sql);
        endforeach;

        return true;
    }

    //remove product from all carts
    function remove_from_all_carts($c_id)
    {
        $sql = "SELECT * FROM cart WHERE c_id = $c_id";
        $record = $this->db_fetch_all($sql);

        foreach ($record as $row):
            $id = $row['p_id'];
            $sql = "DELETE * FROM cart WHERE p_id = $id";
            $this->db_query($sql);
        endforeach;

        return true;

    }

    //function to add a bid
    function add_bid($c_id,$pid,$amt)
    {
        $sql = "INSERT INTO bids (user_id,product_id,bid_amt,bid_status) VALUES ('$c_id','$pid','$amt','Accepted')";
        return $this->db_query($sql);
    }

    //function update current bid
    function update_bid($pid,$amt)
    {
        $sql = "UPDATE products SET current_bid = '$amt' WHERE product_id = '$pid'";
        return $this->db_query($sql);
    }

    //select bids per product
    function product_bids($p_id)
    {
        $sql = "SELECT * FROM bids WHERE product_id = $p_id ORDER BY bid_amt DESC LIMIT 1";
        $record = $this->db_fetch_one($sql);
        return $record;
    } 

    //remove from all carts
    function cart_remove_all($p_id)
    {
        $sql = "DELETE FROM cart WHERE p_id = $p_id";
        return $this->db_query($sql);
    }
    
    
}

 