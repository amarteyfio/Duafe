<?php
/**
 * This file contains the controllers for the products class
 * 
 * @author Philip Amarteyfio
 * @since Novemeber 2022
 */

 //require product class
 set_include_path(dirname(__FILE__)."/../");
 require("class/product_class.php");


 /*---PRODUCT FUNCTIONS  ---*/

 //SELECT PRODUCT WITH ID CONTROLLER
 function select_product_by_id_ctrl($id)
 {
    $product = new product_class();
    return $product->select_product_by_id($id);
    
 }

 //SELECT AVAILABLE PRODUCT CONTROLLER
 function select_available_products_ctrl()
 {
    $product = new product_class();
    return $product->select_available_products();
 }

 //ADD PRODUCT CONTROLLER
 function add_product_ctrl($category,$artist,$name,$price,$bid,$image,$desc,$keywords)
 {
    $product = new product_class();
    return $product->add_product($category,$artist,$name,$price,$bid,$image,$desc,$keywords);
 }

 //EDIT PRODUCT CONTROLLER
 function edit_product_ctrl($id,$category,$artist,$name,$price,$bid,$keywords,$desc)
 {
        $product = new product_class();
        return $product->edit_product($id,$category,$artist,$name,$price,$bid,$keywords,$desc);
 }

 //DELETE PRODUCT CONTROLLER
 function delete_product_ctrl($id)
 {
    $product = new product_class();
    return $product->delete_product($id);
 }

 //GET PRODUCT COUNT CONTROLLER
 function get_product_count_ctrl()
  {
     $product = new product_class();
     return $product->get_product_count();
  }

  //GET NEW ARRIAVLS
  function get_new_products_ctrl()
  {
    $product = new product_class();
    return $product->get_new_products();
  }

  //SELECT USER BY NAME
  function get_product_by_name_ctrl($name)
  {
     $product = new product_class();
     return $product->select_product_by_name($name);
  }

  //select product by cat ctrl
  function select_product_by_cat_ctrl($cat)
  {
     $product = new product_class();
     return $product->select_product_by_cat($cat);
  }

  //select similar product controllers
  function select_similar_products_ctrl($cat,$e_id)
  {
     $product = new product_class();
     return $product->select_similar_products($cat,$e_id);
     
  }

  //search controller
  function product_search_ctrl($term)
  {
   $product = new product_class();
   return $product->product_search($term);
  }

  //set bid date controller
  function set_bid_date_ctrl($id,$date)
  {
   $product = new product_class();
   return $product->set_bid_date($id,$date);
  }
  

  /*---PRODUCT CONTROLLERS ---*/


  /*---CATEGORY CONTROLLERS ----*/

  //add category 
  function add_category_ctrl($category)
  {
    $product = new product_class();
    return $product->add_category($category);  
  }


  //Check Category
  function category_check_ctrl($category)
  {
    $product = new product_class();
    return $product->category_check($category);
  }
  
  //get category name
  function get_category_name_ctrl($id)
  {
    $product = new product_class();
    return $product->get_category_name($id);
  }

  //get categorry id
  function get_category_id_ctrl($category)
  {
    $product = new product_class();
    return $product->get_category_id($category);

  }

  //edit category
  function edit_category_ctrl($id,$cat)
  {
    $product = new product_class();
    return $product->edit_category($id,$cat);
  }

  //delete category
  function delete_category_ctrl($id)
    {
      $product = new product_class();
      return $product->delete_category($id);
    }

   //select category
   function select_category_ctrl($id)
   {
      $product = new product_class();
      return $product->select_category($id);
   }


  /*---CATEGORY CONTROLLERS ----*/


  /*---ARTSIST CONTROLLERS ----*/

  //get artist name
  function get_artist_name_ctrl($id)
  {
    $product = new product_class();
    return $product->get_artist_name($id);
  }
?>