<?php
include "dbconnect.php";
session_start();
 if(!isset($_SESSION)||($_SESSION['username']=='admin'))
 {
	header('location:index.php');
 }
    $user=$_SESSION['username'];
    $s3="select * from register where username='$user'";
    $result=mysql_query($s3);
    $row=mysql_fetch_array($result);
    $u=$row['regid'];
    $s2="select * from cart where regid='$u'";
    $re=mysql_query($s2);
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cart</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<table width="200" border="1">
  <tr>
    <td>Image</td>
    <td>Name</td>
	<td>Product ID</td>
    <td>Quantity</td>
    <td>Price</td>
	
  </tr>
  <?php
$sum=0;  
   while($r1=mysql_fetch_array($re))
   {
    $p=$r1['pid'];
    $s1="select * from adding where pid='$p'";
    $re2=mysql_query($s1);
    $r2=mysql_fetch_array($re2);
    
  ?>
   <tr>
    <td><img width='150' height='150' src="img/<?php echo $r2['pic']?>" alt="" /></td>
    <td><?php echo $r2['name']?></td>
	 <td><?php echo $r2['pid']?></td>
    <td><?php echo $r1['quantity']?></td>
    <td><?php echo $r1['total']?></td>
	<td><a href="cartdelete.php?id=' . $r2['p'] . '">Delete</a></td>
  </tr>
  <?php
     $sum=$sum+$r1['total'];  
  }?>
</table>
<table width="200" border="0">
  <tr>
    <td><h2>TOTAL</h2></td>
    <td><input name="total" type="text" value="<?php echo $sum?>"></td>
  </tr>
</table>

  <input type="submit" class='btn btn-primary 'name="submit" style="margin-top:5px; " value="submit" />

	
</body>
</html>