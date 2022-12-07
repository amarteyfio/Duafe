<?php 

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
            

            //add item to cart of user if not added already
            if(check_item_in_cart_ctrl($bid['product_id'],$bid['user_id']) == false){

                add_to_cart_ctrl($bid['product_id'],$bid['user_id'],$bid['bid_amt']);
                echo "";

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