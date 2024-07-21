<?php
$menuitem="Profile";
include_once('includes/header.php');
$email=$_SESSION['email'];
if(isset($_POST['sub7'])){
	$aid=$_POST['aid'];
	$aemail=$_POST['aemail'];
	$aname=$_POST['aname'];
	$amobilenum=$_POST['amobilenum'];
	$apassword=$_POST['apassword'];
	$q7="update adminlogin set aname='$aname', aemail='$aemail', amobilenum='$amobilenum', apassword='$apassword' where aid='$aid'";
	$run7=mysqli_query($con,$q7);
	if($run7){
		$msg="<div class='mt-4 alert alert-success'>Updated Successfully</div>";
	}else{
		$msg="<div class='mt-4 alert alert-danger'>Not Updated</div>";
	}
	
}
$q6="select * from adminlogin where aemail='$email'";
$run6=mysqli_query($con,$q6);
$row6=mysqli_fetch_array($run6);

?>
<h4 class="text-center mt-4">Welcome <?php echo$_SESSION['name'];?> to the admin panel</h4>
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
<input type="text" readonly name="aid" value="<?php if(isset($row6['aid'])){echo$row6['aid'];} ?>" class="form-control">
</div>
<div class="form-group">
<strong>Name</strong>
<input type="text" class="form-control" name="aname" required placeholder="Enter Your Full Name" value="<?php if(isset($row6['aname'])){echo$row6['aname'];} ?>">
</div>

<div class="form-group">
<strong>Mobile Number</strong>
<input type="text" class="form-control" name="amobilenum" required placeholder="Enter Your Mobile Number" value="<?php if(isset($row6['amobilenum'])){echo$row6['amobilenum'];} ?>">

</div>

<div class="form-group">
<strong>Email</strong>
<input type="email" class="form-control" name="aemail" required placeholder="Enter Your Email" value="<?php if(isset($row6['aemail'])){echo$row6['aemail'];} ?>">
</div>

<div class="form-group">
<strong>Password</strong>
<input type="password" class="form-control" name="apassword" required placeholder="Enter Your Password"  value="<?php if(isset($row6['apassword'])){echo$row6['apassword'];} ?>">
</div>

<div class="form-group text-center">
<input type="submit" name="sub7" class="btn btn-danger" value="Update">
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