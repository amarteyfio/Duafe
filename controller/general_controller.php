<?php
/**
 * THis file contains the controllers for the general class
 * 
 * @author Philip Amarteyfio
 * @version 1.0
 * 
 */


//require the general class
set_include_path(dirname(__FILE__)."/../");
require 'class/general_class.php';



//--SELECT ALL CONTROLLER--//
function select_all_ctr($table)
{
    $recs = new general_class();
    return $recs->select_all($table);
}

//Get table count
function get_table_count_ctrl($table)
{
    $recs = new general_class();
    return $recs->get_table_count($table);
}
?>