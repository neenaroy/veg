<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

include('dbconnect.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$pid = $_GET['id'];



// delete the entry

$result = mysql_query("DELETE FROM adding WHERE pid=$pid")

or die(mysql_error());




// redirect back to the view page

header("Location: admprdview.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: admprdview.php");

}



?>
</body>
</html>
