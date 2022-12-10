<?php 
//include core
//include "settings/core.php";



//include store controller
//include "controller/store_controller.php";


//include general controller
//include "controller/general_controller.php";

//include product controller
//include "controller/product_controller.php";



//products
$products = select_available_products_ctrl();

//current date format
$current_date = date("Y-m-d");

//if bid time is not null
foreach($products as $product):
    if($product['bid_end'] != NULL)
    {
        //if it is the bid day
        if(strtotime($product['bid_end']) <= strtotime($current_date))
        {
            //get heighest bid for the product
            $bid = product_bids_ctrl($product['product_id']);
            
            if(empty($bid))
            {
                exit;
            }
            

            //add item to cart of user if not added already
            if(check_item_in_cart_ctrl($bid['product_id'],$bid['user_id']) == false){

                add_to_cart_ctrl($bid['product_id'],$bid['user_id'],$bid['bid_amt']);

                //remove from all other carts
                cart_remove_all_ctrl($bid['product_id']);

            }
            else
            {
                echo "";
            }

            



            

            
        }
        else
        {
            echo "";
        }
            
    }




endforeach;










?>