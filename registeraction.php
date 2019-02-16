<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include "dbconnect.php";
$s4="select * from register where username='".$_POST['username']."'";
$res=mysql_query($s4);
if($a=mysql_fetch_array($res))
{
?>
<script type="text/javascript">
alert(" Username already exist");
</script>
<?php

}
else
{
$s2="insert into register values(0,'".$_POST['name']."','".$_POST['address']."','".$_POST['phonenumber']."','".$_POST['place']."','".$_POST['pincode']."','".$_POST['email']."','".$_POST['username']."','".$_POST['password']."')";
$s3="insert into login values(0,'".$_POST['name']."','".$_POST['password']."')";
mysql_query($s2);
mysql_query($s3);

?>
<script type="text/javascript">
alert("Registered successfully");
window.location.href="register.php";
</script>
<?php
}
?>
</body>
</html>
