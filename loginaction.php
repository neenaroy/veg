
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
session_start();
include 'dbconnect.php';
if($_POST['type']=="admin")
{
$s3="select * from login where username='".$_POST['username']."' and password='".$_POST['password']."' ";
$ress=mysql_query($s3);
if($a=mysql_fetch_array($ress))
{
	$_SESSION["id"]=$a[0];
	$_SESSION['username']=$a[1];
	header('location:adminhome.php');
	
	
	
}
else
{
?>
	<script>
	alert("invalid userlogin");
	window.location.href="login.php";
	</script>
	<?php
}
}

else if($_POST['type']=="user")
{
$s4="select * from  register where username='".$_POST['username']."' and password='".$_POST['password']."' ";
$res=mysql_query($s4) or die (mysql_error());
if($b=mysql_fetch_array($res))
	{
	
		$_SESSION["id"]=$b[0];
		$_SESSION['username']=$b[7];
		header('location:userhome.php');
	}
	else
	{
	?>
	<script>
	alert("Not approved");
	window.location.href="login.php";
	</script>
	<?php
	}
	
}

?>
	

</body>
</html>
