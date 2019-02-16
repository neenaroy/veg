<?php
session_start();
include("dbconnect.php");
if(!isset($_SESSION['username'])&&(!$_SESSION['username']=='admin'))
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organic Vegetables</title>
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
						<li role="presentation" class="active"><a href="adminhome.php">Home</a></li>
						<li role="presentation"><a href="additem.php">AddItem</a></li>
						<li role="presentation"><a href="admprdview.php">ViewVeg</a></li>
						<li role="presentation"><a href="vcart.php">ViewCart</a></li>				
						<li role="presentation"><a href="logout.php">Logout</a></li>					
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
				<form class="form-search" action="addaction.php" method="POST">
				
				<table width="463" height="194">
			 
  <tr>
    <td>&nbsp;<label>Name</label></td>
    <td>&nbsp;<input type="text" name="name" ></td>
  </tr>
  <tr>
    <td>&nbsp;<label>Description</label></td>
    <td>&nbsp;<textarea name="des" required></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;<label>Cost</label></td>
    <td>&nbsp;<input type="text" name="amount" required></td>
  </tr>
  <tr>
    <td>&nbsp;<label>Image</label></td>
    <td>&nbsp;<input type="file" name="pic" required></td>
  </tr>
  <tr>
    <td>&nbsp;<label>Availability</label></td>
    <td>&nbsp;<input type="text" name="avail" required></td>
  </tr>
   <tr>
    <td>&nbsp;</td><br><br><br><br>
	<td><button onkeydown="document.getElementById('from').value=null;document.getElementById('selectform' type="reset">Cancel</button> 
				<button class="button button4" name="sub2" value="submit">SUBMIT</button>	
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
					
				</div>
			</div>
			<a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
		</div>			
	</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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