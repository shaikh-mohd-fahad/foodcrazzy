<?php
if(isset($_COOKIE['umobilenum'])&&isset($_COOKIE['umobilenum'])){
	echo"<script>location.href='profile.php'</script>";
}
include_once('conn.php');
if(isset($_POST['sub3'])){
	$umobilenum=$_POST['umobilenum'];
	$upassword=$_POST['upassword'];
	$q3="select * from userlogin where umobilenum='$umobilenum' and upassword='$upassword'";
	$run3=mysqli_query($con,$q3);
	if(mysqli_num_rows($run3)==1){
		$row3=mysqli_fetch_array($run3);
		$uname=$row3['uname'];
		setcookie('umobilenum',"$umobilenum",time()+60*60*24*100);
		setcookie('uname',"$uname",time()+60*60*24*100);
		echo"<script> window.location='profile.php';</script>";
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
<link href="image/foodcrazzy.png" type="image" rel="icon">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>

<div  id="header" style="min-height:585px;"><!-- header started -->
<?php 
include_once('includes/navbar.php');
?>
<div class="container mt-4" id="container"> <!-- row started -->
<div class="row"> <!-- row started -->

<div class="col-md-8 offset-md-2"> <!-- col-md-8 started -->
<form action="" class="text-white" method="post"><!-- form started -->
<div class="form-group">
<strong>Mobile Number</strong>
<input type="text" class="form-control" name="umobilenum" required placeholder="Enter Your Mobile">
</div>

<div class="form-group">
<strong>Password</strong>
<input type="password" class="form-control" name="upassword" required placeholder="Enter Your Password">
</div>
<div class="form-group ">
<a href="signup.php" name="" class="text-white font-weight-bold right">Don't have an account?</a>
</div><br>
<div class="form-group text-center">
<input type="submit" name="sub3" class="btn btn-info" value="Login">
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