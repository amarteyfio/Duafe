<?php
/**
 * This class contains general functions for database operations
 * 
 * @author Amarteyfio
 * @version 1.0
 * 
 */

//include db_class
set_include_path(dirname(__FILE__)."/../");
include_once("settings/db_class.php");

class general_class extends db_connection{
    
    //--SELECT ALL--//
    function select_all($table){
        $sql = "SELECT * FROM $table";
        $records = $this->db_fetch_all($sql);
        return $records;
    }

    //--SELECT COUNT--//
    function get_table_count($table){
        $sql = "SELECT * from $table";
        $records = $this->db_fetch_all($sql);
        $count = 0;
        foreach($records as $record):
            $count++;
        endforeach;

        return $count;

    }
}

?>