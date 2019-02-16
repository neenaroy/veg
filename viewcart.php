<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
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
$result = mysql_query("SELECT * FROM cart")
or die(mysql_error());
// display data in table
//echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>username</th> <th>product</th> <th>Quantity</th> <th>total</th> </tr>";
// loop through results of database query, displaying them in the table
while($row = mysql_fetch_array( $result )) {
// echo out the contents of each row into a table
echo "<tr>";
echo '<td>' . $row['cid'] . '</td>';
echo '<td>' . $row['regid'] . '</td>';
echo '<td>' . $row['pid'] . '</td>';
echo '<td>' . $row['quantity'] . '</td>';
echo '<td>' . $row['total'] . '</td>';

echo "</tr>";
}
// close table>
echo "</table>";
?>


</body>
</html>
