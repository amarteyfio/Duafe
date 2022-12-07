<?php
/**
 * This file contains the functions for the products
 * 
 * @author Philip Amarteyfio
 * @since November 2022
 * @version 1.0
 * 
 */

 //include db class
 set_include_path(dirname(__FILE__)."/../");
 include_once "settings/db_class.php";


 class product_class extends db_connection{

    /*---PRODUCT FUNCTIONS ---*/


    /**
     * This function selects a product from the database using it's id 
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

    //SELECT A PRODUCT USING ID
    function select_product_by_id($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = $id";
        $record = $this->db_fetch_one($sql);
        return $record;
    }

    /**
     * This function selects available products from the database  
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

    //SELECT AVAL PRODUCTS FROM DATABASE
    function select_available_products()
    {
        $sql = "SELECT * FROM products WHERE product_status = 0";
        $record = $this->db_fetch_all($sql);
        return $record;
    }
    

    /**
     * This function creates a new product in the database
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     //INSERT INTO PRODUCTS
     function add_product($category,$artist,$name,$price,$bid,$image,$desc,$keywords)
     {
        $sql = "INSERT INTO products (category_id,artist_id,product_name,product_price,current_bid,product_image,description,keywords) VALUES ('$category','$artist','$name','$price','$bid','$image','$desc','$keywords')";
        return $this->db_query($sql);
     }


    /** 
     *This function edits a product 
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */      

    function edit_product($id,$category,$artist,$name,$price,$bid,$keywords,$desc)
    {
        $sql = "UPDATE products SET category_id = '$category',artist_id = '$artist',product_name = '$name',product_price = '$price',current_bid = '$bid',keywords = '$keywords',description = '$desc'  WHERE product_id = $id";
        return $this->db_query($sql);
    }


    /**
     * This function deletes a product from the database
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */

     
     function delete_product($id)
     {
        $sql = "DELETE FROM products WHERE product_id = $id";
        return $this->db_query($sql);
     }
    

    /**
     * This function counts products in the database
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     //get_product_count
     function get_product_count()
     {
        $sql = "SELECT * FROM products";
        $records = $this->db_fetch_all($sql);
        $count = 0;

        foreach($records as $record):
            $count++;
        endforeach;

        return $count;
        
     }


     /**
     * This function gets recent products in the database
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     //get new arrivals
     function get_new_products()
     {
        $sql = "SELECT * FROM products WHERE product_status = 0 ORDER BY product_name DESC LIMIT 6";
        $records = $this->db_fetch_all($sql);
        return $records;
     }


     /**
      * This function selects a product using it's name
      *
      * @author Philip Amarteyfio
      * @since November 2022
      * 
      */

      function select_product_by_name($name)
      {
        $sql = "SELECT * FROM products WHERE product_name = '$name'";
        $record = $this->db_fetch_one($sql);
        return $record;
      }


      /**
       * This function selects a product per category
       * 
       * @author Philip Amarteyfio
       * @since November 2022
       * 
       */

       function select_product_by_cat($cat_id)
       {
         $sql = "SELECT * FROM products WHERE category_id = '$cat_id' AND product_status = 0";
         $record = $this->db_fetch_all($sql);
         return $record;
       }

       /**
        * This function selects similar products
        *
        *
        *@author Philip Amarteyfio
        *@since November 2022
        * 
        */
        
        function select_similar_products($cat_id,$e_id)
        {
            $sql = "SELECT * FROM products WHERE category_id = '$cat_id' AND product_status = 0 AND  product_id NOT IN ('$e_id')";  
            $record = $this->db_fetch_all($sql);
            return $record;
        }

        /**
         * Set bid date
         * 
         * 
         * 
         *  @author Philip Amarteyfio
         * @since November 2022
         * 
         */

         function set_bid_date($id,$date)
         {
            $sql = "UPDATE products SET bid_end = '$date' WHERE product_id = '$id'";
            return $this->db_query($sql);
         }

        
      

     /*---PRODUCT FUNCTIONS ---*/


     /* ---CATEGORY FUNCTIONS ---*/

     /**
     * This function adds a category
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     function add_category($category)
     {
        $sql = "INSERT INTO categories (category_name) VALUES ('$category')";
        return $this->db_query($sql);
     }

     /**
     * This function checks if a category exists
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     function category_check($cat)
     {
        $sql = "SELECT * FROM categories WHERE category_name = '$cat'";
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
     * This function gets a category name from the database
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     function get_category_name($id)
    {
        $sql = "SELECT category_name FROM categories WHERE category_id = $id";
        $name = $this->db_fetch_one($sql);
        return $name['category_name'];
    }


    /**
     * Delete a category
     * 
     * 
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     */

        function delete_category($id)
        {
              $sql = "DELETE FROM categories WHERE category_id = $id";
             return $this->db_query($sql);
        }


    /**
     * Edit a category
     * 
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     function edit_category($id,$cat)
     {
        $sql = "UPDATE categories SET category_name = '$cat' WHERE category_id = $id";
        return $this->db_query($sql);
     }


     /**
      * Select a category
      *
      *@author Philip Amarteyfio
      */

      function select_category($cat_id)
      {
        $sql = "SELECT * FROM categories WHERE category_id = '$cat_id'";
        $record = $this->db_fetch_one($sql);
        return $record;
      }

    /* -- ARTIST CONTROLLER -- */
    
    /**
     * This function gets a category name from the database
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     function get_artist_name($id)
     {
        $sql = "SELECT artist_name FROM artists WHERE artist_id = $id";
        $name = $this->db_fetch_one($sql);
        return $name['artist_name'];
     }


     /**
      * This function gets a category id from the database
      *
      * @since November 2022
      * @author Philip Amarteyfio
      */

    function get_category_id($category)
    {
        $sql = "SELECT category_id FROM categories WHERE category_name = '$category'";
        $record = $this->db_fetch_one($sql);
        return $record['category_id'];
    }

    /**
     * This function is used to search for a product 
     * 
     * 
     * @author Philip Amarteyfio
     * @since November 2022
     * 
     */

     function product_search($term)
     {
        $sql = "SELECT * FROM `products` WHERE product_status = 0  AND `keywords` LIKE '%{$term}%' ORDER BY 'keywords'";
        $results = $this->db_fetch_all($sql);
        return $results;
     }


 }
?>