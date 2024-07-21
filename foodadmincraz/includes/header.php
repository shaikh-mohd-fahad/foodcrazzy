<?php
session_start();
if(!isset($_SESSION['email'])){
	echo"<script>window.location='login.php';</script>";
}
include_once('../conn.php');
?>
<!doctype html>
<html lang="en">
<head>
<title><?php if(isset($menuitem)){echo$menuitem;} ?> </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>
<div id="header">
<div class="navbar navbar-dark navbar-expand-md" style="background:#ff992b"><!-- navbar started -->
<div class="container"><!-- navbar container started -->
<a href="../index.php" class="navbar-brand font-italic font-weight-bold">FoodCrazzy</a><small style="color:white"><i class="fas fa-map-marker-alt"></i> Bhitoli</small>
 <button class="navbar-toggler" data-toggle="collapse" data-target="#nclp"><i class="navbar-toggler-icon"></i></button> 
<div class="collapse navbar-collapse" id="nclp">
<ul class="nav navbar-nav ml-auto">
<li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-user"></i> Log out</a></li>
</ul>
</div>
</div><!-- navbar container ended -->
</div><!-- navbar ended -->
</div>