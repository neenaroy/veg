<?php
include "dbconnect.php";
session_start();
if(!isset($_SESSION['username']))
 {
	header('location:index.php');
 }
    $user=$_SESSION['username'];
    $s3="select * from register where username='$user'";
    $result=mysql_query($s3);
    $row=mysql_fetch_array($result);
	if(!isset($_POST['sub']))
	$res=mysql_query("SELECT distinct name,p.regid FROM cart p,register r where p.regid=r.regid") or die(mysql_error());
	if(isset($_POST['sub']))
	{
		$res=mysql_query("SELECT distinct name,p.regid FROM cart p,register r where p.regid=r.regid") or die(mysql_error());
	    $i=$_POST['id'];
		$res1 = mysql_query("SELECT *  FROM cart p,register r,adding pp where p.regid='$i' and r.regid='$i' and p.pid=pp.pid ") or die(mysql_error());
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<a href="adminhome.php">HOME</a>
<!--

VIEW.PHP
get results
-->
<table border='0' cellpadding='10'>
<tr><td> User list</td></tr>
<?php
while($row=mysql_fetch_array($res))
{
	$u=$row['regid'];
	$un=$row['name'];
?>
<tr>
<td>
<form action='#usrlist' method='post'>
<input type='hidden' value="<?php echo $u?>" name='id'>
<input type='hidden' value="<?php echo $un?>" name='name'>
<button type='submit' name='sub' class='btnbtn-default'><?php echo $row['name']?></button>
</form>
</td>


</tr>
<?php
 }
?>
</table>
<div id='usrlist'>
<?php
if(isset($_POST['sub']))
	{
?>
<div class='row'>
<div class=' text-center'>
<h2>Order List</h2>
</div>
<table>
<tr><th>Product name</th><th>Quantity</th><th>Price</th><th>Address</th><th>Contact Number</th></tr>
</div>	
<?php
	while($r1=mysql_fetch_array($res1))
	{
?>	
<div class='row'>
<tr><td><?php echo $r1['name']?></td><td><?php echo $r1['quantity']?></td><td><?php echo $r1['total']?></td><td><?php echo $r1['address']?></td><td><?php echo $r1['phonenumber']?></td></tr>
</div>
<?php
   }
   ?>
</table>
<?php
	}
?>
</div>


</body>
</html>
