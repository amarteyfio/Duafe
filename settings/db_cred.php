<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

//credentials
define('DB_SERVER', $cleardb_url["host"]);
define('DB_USERNAME', $cleardb_url["user"]);
define('DB_PASSWORD', $cleardb_url["pass"]);
define('DB_NAME', substr($cleardb_url["path"],1));


$active_group = 'default';
$query_builder = TRUE;



/*/ LOCAL HOST CREDENTIALS 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'duafe_db');


?>