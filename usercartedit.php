<?php
session_start();
include("dbconnect.php");
//include("")
if(!isset($_SESSION)||(!$_SESSION['username']=='admin'))
{
	header('location:index.php');
}
$user=$_SESSION['username'];
$s3="select * from register where username='$username'";
$result=mysql_query($s3);
$row=mysql_fetch_array($result);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/set1.css" />
	<link href="css/overwrite.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
/*
EDIT.PHP
Allows user to edit specific entry in database
*/
// creates the edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($cid, $regid, $pid, $quantity, $total,$error)
{
?>
<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Edit record</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
// if there are any errors, display them
if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>
<form action="" method="post">
<input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
<div>
<table cellpadding="1" border="0">
<tr>
<p><strong><tr><td>Cart ID:</td></strong><td> <?php echo $cid; ?></td></tr></p>
<strong><tr><td>: Username*</td></strong> <td><input type="text" name="regid" value="<?php echo $regid; ?>"/></td></tr><br/>
<strong><tr><td>Product name: *</th></strong><td> <input type="text" name="pid" value="<?php echo $pid; ?>"/></td></tr><br/>
<strong><tr><td>Quantity: *</th></strong><td> <input type="text" name="quantity" value="<?php echo $quantity; ?>"/></td></tr><br/>
<strong><tr><td>Total Price: *</th></strong> <td><input type="file" name="total" value="<?php echo $total; ?>"/></td></tr><br/>

<p><tr><td>* Required</td></tr></p>
<tr><td><input type="submit" name="submit" value="Update"></td></tr>

</div>
<table>
</form>
</body>
</html>
<?php
}
// connect to the database
include('dbconnect.php');
// check if the form has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit']))
{
// confirm that the 'id' value is a valid integer before getting the form data
if (is_numeric($_POST['cid']))
{
// get form data, making sure it is valid
$cid= $_POST['cid'];
$regid = mysql_real_escape_string(htmlspecialchars($_POST['regid']));
$pid = mysql_real_escape_string(htmlspecialchars($_POST['pid']));
$quantity = mysql_real_escape_string(htmlspecialchars($_POST['quantity']));
$pic; //= mysql_real_escape_string(htmlspecialchars($_POST['pic']));
$total = mysql_real_escape_string(htmlspecialchars($_POST['total']));

// check that pname/image/.. fields are both filled in
if ($regid == '' || $pid == '' || $quantity == ''|| $total== '')
{
// generate error message
$error = 'ERROR: Please fill in all required fields!';
//error, display form
renderForm($cid, $regid, $pid, $quantity, $total,$error);
}
else
{
// save the data to the database
//mysql_query("UPDATE cart SET name='$name', des='$des', amount='$amount', avail='$avail' WHERE pid='$pid'")
mysql_query("UPDATE cart SET cid='$cid', regid='$regid',pid='$pid', quantity='$quantity',total='$total' WHERE cid='cid'")

or die(mysql_error());
// once saved, redirect back to the view page
header("Location: admprdview.php");
}
}
else
{
// if the 'id' isn't valid, display an error
echo 'Error!';
}
}
else
// if the form hasn't been submitted, get the data from the db and display the form
{
// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// query db
$cid = $_GET['id'];
$result = mysql_query("SELECT * FROM cart WHERE cid=$cid")
or die(mysql_error());
$row = mysql_fetch_array($result);
// check that the 'id' matches up with a row in the databse
if($row)
{



// get data from db

$regid = $row['regid'];

$pid = $row['pid'];
$quantity = $row['quantity'];
$total = $row['total'];
//$avail = $row['avail'];




// show form

renderForm($cid, $regid, $pid, $quantity, $total,'');


}
else
// if no match, display result
{

echo "No results!";

}
}
else
// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
{
echo 'Error!';
}
}
?>
</body>
</html>
