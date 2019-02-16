<?php
  include "dbconnect.php";
  if(isset($_POST['login']))
  {
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from login where username='$username' and password='$password'";
	$result=mysql_query($query,$con);
	if(mysql_num_rows($result)==0)
	{
	 ?>
   <script>
    alert("login ERROR");
	</script>
  <?php
   }
   else
   {
	$row=mysql_fetch_array($result);
	$_SESSION['username']=$row['username'];
	if($row['username']=="admin")
	{
		header('location:adminhome.php');
	}
	else
	{
		?>
   <script>
    alert("USER Login");
	</script>
  <?php
		header('location:userhome.php');
	}
	
    }
	
}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organic vegetables</title>
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link href="css/overwrite.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/set1.css" />
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><span>FrEsH VeG</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="index.php">Home</a></li>
						<li role="presentation"><a href="login.php">Login</a></li>
						<li role="presentation"><a href="gallery.php">Gallery</a></li>
						<li role="presentation"><a href="contact.html">Contact</a></li>	
					</ul>
				</div>
			</div>			
		</div>
	</nav>
		<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="blogs">
					<div class="text-center">
						<h2><i>Welcome</i></h2>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-header">
					<div class="blog">
						<img src="img/pic1.jpg" class="img-responsive"alt="" />			
						<div class="ficon">
							<a href="#" alt=""></a> 
						</div>
					</div>
				</div>	
			</div>
		<div class="col-md-4">
				<form class="form-search" method="post" action="" >
				
				
				
				<table width="463" height="194">
  <tr>
    <td>&nbsp;<label>Username</label></td>
    <td>&nbsp;<input name="username" type="text" required></td>
  </tr>
  <tr>
    <td>&nbsp;<label>Password</label></td>
    <td>&nbsp;<input name="password" type="password" required></td>
  </tr>
   <tr>
    <td>&nbsp;</td><br><br><br><br>
    <td>&nbsp;<button type="submit" name="login"  id="login" value="sub1">Login</button>         
	<td><button onkeydown="document.getElementById('from').value=null;document.getElementById('selectform' type="reset">Cancel</button> 
  </tr>
 <tr>
    <td height="22">&nbsp;New User?</td>
    <td>&nbsp;<a href="register.php"><u>Register here</u></a></td>
  </tr>
</table>
				</form>
				
		<div class="container">
			<div class="row">				
				<div class="col-md-8">
					<div class="col-md-4">	
					<div class="popular-tags">
					</div>				
				</div>	
			</div>			
		</div>
	<footer>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					
			<a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
		</div>			
	</footer>
	<script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
  </body>
</html>