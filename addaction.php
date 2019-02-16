<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include "dbconnect.php";
$s3="insert into adding values(0,'".$_POST['name']."','".$_POST['des']."','".$_POST['amount']."','".$_POST['pic']."','".$_POST['avail']."')";
mysql_query($s3);
?>
<script type="text/javascript">
alert("Added successfully");
window.location.href="additem.php";
</script>
<?php
?>
</body>
</html>
