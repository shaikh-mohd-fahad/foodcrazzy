<?php
// profiel page to show the profile of the user
if(!isset($_COOKIE['umobilenum'])&&!isset($_COOKIE['umobilenum'])){
	echo"<script>location.href='login.php'</script>";
}
include_once('conn.php');

$menuitem="Profile";

//updating user detail 
if(isset($_POST['sub23'])){
	$uid=$_POST['uid'];
	$uemail=$_POST['uemail'];
	$uname=$_POST['uname'];
	$umobilenum=$_POST['umobilenum'];
	$upassword=$_POST['upassword'];
	$q23="update userlogin set uname='$uname', uemail='$uemail', umobilenum='$umobilenum', upassword='$upassword' where uid='$uid'";
	$run23=mysqli_query($con,$q23);
	if($run23){
		$msg="<div class='mt-4 alert alert-success'>Updated Successfully</div>";
	}else{
		$msg="<div class='mt-4 alert alert-danger'>Not Updated</div>";
	}
	
}

// getting user detail to show detail to the user on the profile page on sidebar
$q22="select * from userlogin where umobilenum=".$_COOKIE['umobilenum'];
$run22=mysqli_query($con,$q22);
$row22=mysqli_fetch_array($run22);
$img=$row22['uimage'];

?>
<!doctype html>
<html lang="en">
<head>
<title>User Profile </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="image/foodcrazzy.png" type="image" rel="icon">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>

<div  id="header"style="background:none;min-height:auto"><!-- header started -->
<?php 
include_once('includes/navbar.php');
?>
</div><!-- header ended -->



<h4 class="text-center mt-4">Welcome <?php echo$_COOKIE['uname'];?> to the Profile</h4>
<div class="container mt-4"><!-- container started -->
<div class="row"><!-- row started -->
<!-- col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!-- col-md-2 sidebar menu ended -->

<div class="col-md-10"><!-- col-md-10 started -->
<form class="" action="" method="post">
<div class="form-group">
<input type="hidden" readonly name="uid" value="<?php if(isset($row22['uid'])){echo$row22['uid'];} ?>" class="form-control">
</div>
<div class="form-group">
<strong>Name</strong>
<input type="text" class="form-control" name="uname" required placeholder="Enter Your Full Name" value="<?php if(isset($row22['uname'])){echo$row22['uname'];} ?>">
</div>

<div class="form-group">
<strong>Mobile Number</strong>
<input type="text" class="form-control" name="umobilenum" required placeholder="Enter Your Mobile Number" value="<?php if(isset($row22['umobilenum'])){echo$row22['umobilenum'];} ?>">

</div>

<div class="form-group">
<strong>Email</strong>
<input type="email" class="form-control" name="uemail" required placeholder="Enter Your Email" value="<?php if(isset($row22['uemail'])){echo$row22['uemail'];} ?>">
</div>

<div class="form-group">
<strong>Password</strong>
<input type="password" class="form-control" name="upassword" required placeholder="Enter Your Password"  value="<?php if(isset($row22['upassword'])){echo$row22['upassword'];} ?>">
</div>

<div class="form-group text-center">
<input type="submit" name="sub23" class="btn btn-danger" value="Update">
</div>

</form>
<?php
if(isset($msg)){
echo$msg;}
?>
</div><!-- col-md-10 ended -->
</div><!-- row ended -->
</div><!-- container ended -->



<?php
include_once('includes/footer.php');
?>