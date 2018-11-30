//connection
<?php
session_start();
$server='localhost';	//require 'DB.php';
$username='root';
$password='';
$database='products';
$con=mysql_connect($server,$username,$password,$database);	////$con=DB::connect("mysql://root:root@localhost/$database");
mysql_select_db('products');	

if(!$con)	//$con->setErrorHandling(PEAR_ERROR_DIE);$db->setFetchMode(DB_FETCHMODE_ASSOC);
	die("can not connect to the database $database on the server $server");

?>