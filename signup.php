<?php
include_once('conn.php');
if(isset($_POST['sub1'])){
	$uname=$_POST['uname'];
	$umobilenum=$_POST['umobilenum'];
	$uemail=$_POST['uemail'];
	$upassword=$_POST['upassword'];
	$uaddress=$_POST['uaddress'];
	$q1="select * from userlogin where umobilenum='$umobilenum'";
	$run1=mysqli_query($con,$q1);
	
	if(mysqli_num_rows($run1)==1){
		$msg="<div class='alert alert-danger'> Your Mobile Number is already Register </div>";
	}else{
		$q2="insert into userlogin(uname, uemail, umobilenum, uaddress, upassword) values('$uname', '$uemail', '$umobilenum', '$uaddress', '$upassword')";
		$run2=mysqli_query($con,$q2);
		if($run2){
			$msg="<div class='alert alert-success'> You are Register Successfully</div>";
		}else{
			$msg="<div class='alert alert-danger'> Your Registeration is Failed </div>";
		}
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Sign Up </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Sign Up in Foodcrazzy">
<link href="image/foodcrazzy.png" type="image" rel="icon">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>

<div  id="header" style="min-height:585px;"><!-- header started -->
<div class="navbar navbar-dark navbar-expand-md" style="background:#ff992b"><!-- navbar started -->
<div class="container"><!-- navbar container started -->
<a href="index.php" class="navbar-brand font-italic font-weight-bold">FoodCrazzy</a><small style="color:white"><i class="fas fa-map-marker-alt"></i> Bhitoli</small>
 <button class="navbar-toggler" data-toggle="collapse" data-target="#nclp"><i class="navbar-toggler-icon"></i></button> 
<div class="collapse navbar-collapse" id="nclp">
<ul class="nav navbar-nav ml-auto">
<li class="nav-item"><a href="" class="nav-link"><i class="fas fa-search"></i> Search</a></li>
<li class="nav-item"><a href="" class="nav-link"><i class="fas fa-shopping-cart"></i> Order Food</a></li>
<li class="nav-item"><a href="login.php" class="nav-link"><i class="fa fa-user"></i> Log in</a></li>
</ul>
</div>
</div><!-- navbar container ended -->
</div><!-- navbar ended -->

<div class="container mt-4" id="container"> <!-- row started -->
<div class="row"> <!-- row started -->

<div class="col-md-8 offset-md-2">
<form action="" class="text-white" method="post">

<div class="form-group">
<strong>Name</strong>
<input type="text" class="form-control" name="uname" required placeholder="Enter Your Full Name">
</div>

<div class="form-group">
<strong>Mobile Number</strong>
<input type="text" class="form-control" name="umobilenum" required placeholder="Enter Your Mobile Number">
</div>

<div class="form-group">
<strong>Email</strong>
<input type="email" class="form-control" name="uemail" required placeholder="Enter Your Email">
</div>

<div class="form-group">
<strong>Address</strong>
<input type="text" class="form-control" name="uaddress" required placeholder="Enter Your Full Address">
</div>

<div class="form-group">
<strong>Password</strong>
<input type="password" class="form-control" name="upassword" required placeholder="Enter Your Password">
</div>
<div class="form-group ">
<a href="login.php" name="" class="text-white font-weight-bold right">Already have an account?</a>
</div><br>
<div class="form-group text-center">
<input type="submit" name="sub1" class="btn btn-info" value="Sign Up">
</div>
</form>
<?php 
if(isset($msg)){
	echo"$msg";
}
?>
</div>

</div> <!-- row end -->
</div> <!-- container ended -->
</div><!-- header ended -->
<?php
include_once('includes/footer.php');
?>