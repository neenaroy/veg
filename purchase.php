<?php
session_start();
include("dbconnect.php");
if(!isset($_SESSION)||(!$_SESSION['username']=='admin'))
{
	header('location:index.php');
}


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
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span>FrEsH VeG</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="userhome.php">Home</a></li>
						<li role="presentation"><a href="purchase.php">Purchase</a></li>
						<li role="presentation"><a href="usercart.php">MyCart</a></li>
						<li role="presentation"><a href="logout.php">Logout</a></li>				
										
					</ul>
				</div>
			</div>			
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="slider">
			
				<div class="img-responsive">
					
				</div>	
			</div>
		</div>
	</div>
	
<br />
<div id='items'>
<div class="container">
<h3 align="center">Shopping Zone</h3><br/>
<div class='row'>
<?php
$query="SELECT * FROM adding where avial>0";
$result=mysql_query($query)or die (mysql_error());
while($row=mysql_fetch_array($result))
{
?>
<div >
<form method="post" action="purchase.php">
<img src="img/<?php echo $row["pic"]; ?>" width="150" width="150" /><br>
<div class="row">
<h4 class="text-info"> <?php echo $row["name"]; ?> </h4>
</div>
<h4 class="text-danger">Rs&nbsp<?php echo $row["amount"]; ?> </h4>
<input type="hidden" name="hidden_name"  value="<?php echo $row["name"]; ?>" />
<input type="hidden" name="hidden_price"  value="<?php echo $row["amount"]; ?>" />
<div class='row'><div class='col-md-2 col-md-offset-0'>Available</div>
<div class='col-md-3'><input type="text"  name="availability" class="form-control" value="<?php echo $row['avial']; ?> " /></div></div>
<div class='row'><div class='col-md-2 col-md-offset-0'>Quantity</div>
<?php $av=$row['avial']?>
<div class='col-md-3'><input type="number"  name="qkg" min='0'  max="<?php echo $av ?>" class="form-control" value="Kg" ></div></div>
<div class='row text-center'><input type="submit" name="add_to_zone" style="margin-top:5px; " value="add to cart" /></div><br>
</form>
</div>
<?php
}
?>
</div></div>
</div>
</body>
</html>
<?php 
if(isset($_POST['add_to_zone']))
{
	
	$user=$_SESSION['username'];
    $s3="select * from register where username='$user'";
    $result=mysql_query($s3);
    $ro=mysql_fetch_array($result);
	
	$name=$_POST['hidden_name'];
	$re="SELECT * from adding where name='$name'";
	$res=mysql_query($re);
	$row1=mysql_fetch_array($res);
	$hp=$_POST['hidden_price'];
	$qkg1=$_POST['qkg'];
	//$q=(float)$qkg1+(float)$qgm;
	$price=($hp*$qkg1);
	$a=$ro["regid"];
	$b=$row1["pid"];
	?><script>
	 alert(<?php echo $qgm.$q.$price ?>);
	</script>
	<?php 	
	$s3="insert into cart values(0,'$a','$b','$qkg1','$price')";
	$s4="update adding set avial=avial-'$qkg1' where pid='$b'";
	mysql_query($s3);
	mysql_query($s4);
}
?>
