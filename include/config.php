<?php
$db_user = "";  // Enter your Database Username here
$db_pass = "";  // Enter Database Passowrd here
$db_host = ""; // Enter Databases hostname here, usually localhost
$db_name = "";  // Enter the name of the database you created here

// DO NOT EDIT BELOW HERE
mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_name) or die( "No funciona la base de datos");
// DO NOT EDIT ABOVE HERE

$general =  mysql_fetch_array(mysql_query("Select * FROM config WHERE id = 1"));

?>