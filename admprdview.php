<?php
session_start();
include("dbconnect.php");
if(!isset($_SESSION['username'])&&(!$_SESSION['username']=='admin'))
{
	header('location:index.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Organic vegetables</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
/*
VIEW.PHP
Displays all data from 'players' table
*/
// connect to the database
include('dbconnect.php');
// get results from database
$result = mysql_query("SELECT * FROM adding")
or die(mysql_error());
// display data in table
//echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";
echo '<td><a href="adminhome.php">Back</a></td>';
echo '<br>';
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>Vegetable</th> <th>Description</th> <th>Cost</th> <th>Image</th><th>Availability</th><th>Action</th><th>Action</th></tr>";
// loop through results of database query, displaying them in the table
while($row = mysql_fetch_array( $result )) {
// echo out the contents of each row into a table
echo "<tr>";
echo '<td>' . $row['pid'] . '</td>';
echo '<td>' . $row['name'] . '</td>';
echo '<td>' . $row['des'] . '</td>';
echo '<td>' . $row['amount'] . '</td>';
echo '<td>' . $row['pic'] . '</td>';
echo '<td>' . $row['avial'] . '</td>';


echo '<td><a href="admprdedit.php?id=' . $row['pid'] . '">Edit</a></td>';
echo '<td><a href="admprddlt.php?id=' . $row['pid'] . '">Delete</a></td>';
echo "</tr>";
}
// close table>
echo "</table>";
?>


</body>
</html>
