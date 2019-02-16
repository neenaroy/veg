<?php
$dbname="veg";
$username="root";
$password="";
$host="localhost";
$con=mysql_connect($host,$username,$password)or die(mysql_error());
mysql_select_db($dbname) or die (mysql_error());
 ?>