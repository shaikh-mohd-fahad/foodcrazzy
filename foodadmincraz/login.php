<?php
session_start();
if(isset($_SESSION['email'])){
	echo"<script>window.location='index.php';</script>";
}
include_once('../conn.php');
if(isset($_POST['sub4'])){
	$amobilenum=$_POST['amobilenum'];
	$apassword=$_POST['apassword'];
	$q4="select * from adminlogin where amobilenum='$amobilenum' and apassword='$apassword'";
	$run4=mysqli_query($con,$q4);
	if(mysqli_num_rows($run4)==1){
		$q5="select * from adminlogin where amobilenum='$amobilenum'";
		$run5=mysqli_query($con,$q5);
		$row5=mysqli_fetch_array($run5);
		$_SESSION['email']=$row5['aemail'];
		$_SESSION['name']=$row5['aname'];
		echo"<script> window.location='index.php';</script>";
	}
	else{
		$msg="<div class='alert alert-danger'> Your Mobile Number or Password is wrong </div>";
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Login </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>

<div  id="header" style="min-height:585px;"><!-- header started -->

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

<div class="container mt-4" id="container"> <!-- row started -->
<div class="row"> <!-- row started -->

<div class="col-md-8 offset-md-2"> <!-- col-md-8 started -->
<h4 class="text-center ">Admin Login</h4>
<form action="" class="" method="post"><!-- form started -->
<div class="form-group">
<strong>Mobile Number</strong>
<input type="text" class="form-control" name="amobilenum" required placeholder="Enter Your Mobile">
</div>

<div class="form-group">
<strong>Password</strong>
<input type="password" class="form-control" name="apassword" required placeholder="Enter Your Password">
</div>
<div class="form-group text-center">
<input type="submit" name="sub4" class="btn btn-info" value="Login">
</div>
</form><!-- form ended -->
<?php 
if(isset($msg)){
	echo"$msg";
}
?>
</div><!-- row ended -->

</div> <!-- row end -->
</div> <!-- container ended -->
</div><!-- header ended -->
<?php
include_once('includes/footer.php');
?>