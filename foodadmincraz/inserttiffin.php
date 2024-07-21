<?php
$menuitem="Insert Tiffin";
include_once('includes/header.php');
$email=$_SESSION['email'];
if(isset($_POST['sub9'])){
	$tfname=$_POST['tfname'];
	$tfdesc=$_POST['tfdesc'];
	$tfprice=$_POST['tfprice'];
	$tfdiscount=$_POST['tfdiscount'];
	if($_FILES['tfimg1']['name']!=""){
	$tfimg1=$_FILES['tfimg1']['name'];
	$tfimg1temp=$_FILES['tfimg1']['tmp_name'];}else{
	$tfimg1="not_available.jpg";
	$tfimg1temp="";
	}
	$tfshopname=$_POST['tfshopname'];
	$tfshopadd=$_POST['tfshopadd'];
	$tfshopmobilenum=$_POST['tfshopmobilenum'];
	$ftype=$_POST['ftype'];
	$tfday=$_POST['tfday'];
	$tftime=$_POST['tftime'];
	$q9="insert into tiffin(tfname, tfdesc, tfprice, tfdiscount, tfimg1, tfshopname, tfshopadd,ftype,tfday, tftime, tfshopmobilenum) values('$tfname', '$tfdesc', '$tfprice', '$tfdiscount', '$tfimg1', '$tfshopname', '$tfshopadd','$ftype','$tfday', '$tftime','$tfshopmobilenum')";
	$run9=mysqli_query($con,$q9);
	if($run9){
		move_uploaded_file($tfimg1temp,"image/".$tfimg1);
		$msg="<div class='mt-4 alert alert-success'>Tiffin Added Successfully</div>";
	}else{
		$msg="<div class='mt-4 alert alert-danger'>Tiffin Not Added</div>";
	}
}
?>
<h4 class="text-center mt-4">Insert Tiffin</h4>
<div class="container mt-4"><!-- container started -->
<div class="row"><!-- row started -->
<!-- col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!-- col-md-2 sidebar menu ended -->
<div class="col-md-10"><!-- col-md-10 started -->
<form class="" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
Meal Name
<input type="text" name="tfname" class="form-control" required>
</div>
<div class="form-group">
Meal Description
<input type="text" name="tfdesc" class="form-control" >
</div>
<div class="form-group">
<input type="hidden" name="ftype" value="tiffin" class="form-control" required>
</div>
<div class="form-group">
Price
<input type="text" name="tfprice" class="form-control" required>
</div>
<div class="form-group">
Discount
<input type="text" value="0" name="tfdiscount" class="form-control">
</div>
<div class="row">
<div class="col-md-3 text-left"> <!-- col-md-4 start -->
Select Image :
</div> <!-- col-md-4 end -->
<div class="col-md-3"> <!-- col-md-4 start -->
<div class="form-group">
<label>Image 1
<input type="file" name="tfimg1" class=""></label>
</div>
</div> <!-- col-md-4 end -->
</div>
<div class="form-group">
Shop Name
<input type="text" name="tfshopname" class="form-control" >
</div>
<div class="form-group">
Shop Mobile Number
<input type="text" name="tfshopmobilenum" class="form-control" >
</div>
<div class="form-group">
Shop Address
<input type="text" name="tfshopadd" class="form-control" >
</div>
<div class="form-group">
Day
<input type="text" name="tfday" class="form-control" >
</div>
<div class="form-group">
Time
<input type="text" name="tftime" class="form-control" placeholder="Morning/Noon/Evening">
</div>
<div class="form-group">
<input type="submit" value="Add Food"  name="sub9" class="btn btn-danger btn-block">
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