<?php
/**
 * This file contains the controllers for the store class
 * 
 * @author Philip Amarteyfio
 * @since Novemeber 2022
 */

 //require product class
 
 set_include_path(dirname(__FILE__)."/../");
 require("class/store_class.php");


 /*---PRODUCT FUNCTIONS  ---*/

 //SELECT PRODUCT WITH ID CONTROLLER
 function get_order_count_ctrl()
 {
    $store = new store_class();
    return $store->get_order_count();
    
 }

 //add to cart controllers
 function add_to_cart_ctrl($p_id,$c_id,$amt)
  {
     $store = new store_class();
     return $store->add_to_cart($p_id,$c_id,$amt);
     
  }

  //check if item is in cart controller
  function check_item_in_cart_ctrl($p_id,$c_id)
  {
     $store = new store_class();
     return $store->check($p_id,$c_id);
  }

  //select_cart_by_users_ctrl
  function select_cart_by_users_ctrl($c_id)
  {
     $store = new store_class();
     return $store->select_cart_by_user($c_id);
  }

  //add order
  function ord_ctr($cid,$inv,$date)
  {
   $ord = new store_class();
   return $ord->ord($cid,$inv,$date);
  }

   //add payment
   function payment_ctr($amt,$cid,$order_id,$date)
   {
      $pay = new store_class();
      return $pay->payment($amt,$cid,$order_id,$date);
   }

   //select recent order
   function ord_sel_ctr()
   {
      $sel = new store_class();
      return $sel->ord_sel();
   }

   //remove from cart
   function remcart_ctr($cid)
   {
    $rem = new store_class();
    return $rem->remcart($cid);
   }


   //mark product as purchased controller
   function mark_purchased_ctrl($cid)
   {
    $store = new store_class();
    return $store->mark_purchased($cid);
   }

   //remove products from art controller
   function remove_from_all($p_id)
   {
      $store = new store_class();
      return $store->remove_from_all_carts($p_id);
   }

   //add a bid
   function add_bid_ctrl($c_id,$pid,$amt)
   {
      $store = new store_class();
      return $store->add_bid($c_id,$pid,$amt);
   }

   //update current bid
   function update_bid_ctrl($pid,$amt)
   {
      $store = new store_class();
      return $store->update_bid($pid,$amt);
   }

   function cart_remove_ctrl($pid,$cid)
   {
      $store = new store_class();
      return $store->cart_remove($pid,$cid);
   }


   function product_bids_ctrl($p_id)
   {
      $store = new store_class();
      return $store->product_bids($p_id);
   }

   //cart remove all controller
   function cart_remove_all_ctrl($p_id)
   {
      $store = new store_class();
      return $store->cart_remove_all($p_id);
   }





?>