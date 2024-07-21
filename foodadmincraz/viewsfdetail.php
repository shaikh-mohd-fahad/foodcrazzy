<?php
$menuitem="Street Food Detail";
include_once('includes/header.php');
//update street food details
if(isset($_POST['sub17'])){
	$sfid=$_POST['sfid'];
	$sfname=$_POST['sfname'];
	$sfdesc=$_POST['sfdesc'];
	$sfprice=$_POST['sfprice'];
	if(isset($_FILES['sfimg1']) && ($_FILES['sfimg1']['name']!='')){
	$sfimg1=$_FILES['sfimg1']['name'];
	$sfimg1tmp=$_FILES['sfimg1']['tmp_name'];
	}else{
	$sfimg1=$_POST['tmpimg'];
	$sfimg1tmp='';
	}
	$plate=$_POST['plate'];
	$sfdiscount=$_POST['sfdiscount'];
	$sfshopname=$_POST['sfshopname'];
	$sfshopadd=$_POST['sfshopadd'];
	$sfshopmobilenum=$_POST['sfshopmobilenum'];
	$sfshopstatus=$_POST['sfshopstatus'];
	$q17="update streetfood set sfname='$sfname', sfdesc='$sfdesc', sfprice='$sfprice', sfdiscount='$sfdiscount', sfshopname='$sfshopname', sfshopadd='$sfshopadd', sfshopmobilenum='$sfshopmobilenum', sfshopstatus='$sfshopstatus',plate='$plate',sfimg1='$sfimg1' where sfid='$sfid'";
	$run17=mysqli_query($con,$q17);
	if($run17){
		move_uploaded_file($sfimg1tmp,'image/'.$sfimg1);
		$msg="<div class='alert alert-success mt-4'> Update Successfully </div>";
	}else{
		$msg="<div class='alert alert-danger mt-4'> Update Failed </div>";
	}
}
if(isset($_POST['sub16'])){//edit button on sfdetail.php page
	$sfid=$_POST['sfid'];
	$q16="select * from streetfood where sfid='$sfid'";
	$run16=mysqli_query($con,$q16);
	$row16=mysqli_fetch_array($run16);
}
?>
<h4 class="text-center mt-4">View and Edit Street Food Details</h4>
<div class="container-fluid mt-4"><!-- container started -->
<div class="row"><!-- row started -->
<!-- col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!-- col-md-2 sidebar menu ended -->
<div class="col-md-10"><!-- col-md-10 started -->
<form class="" action="" method="post" enctype="multipart/form-data">
<div class="row mb-3"><!-- row started -->
<div class="col-md-3"><!-- col-md-3 started -->
<img src="image/<?php if(isset($row16['sfimg1'])){echo$row16['sfimg1'];}?>" alt="food/tiffn image" class="img-fluid">
</div><!-- col-md-3 ended -->
<div class="col-md-9"><!-- col-md-9 started -->
<div class="form-group">
<input type="text" name="sfid" value="<?php if(isset($row16['sfid'])){echo$row16['sfid'];} ?>" readonly class="form-control">
</div>
<input type="hidden" name="tmpimg" value="<?php if(isset($row16['sfimg1'])){echo$row16['sfimg1'];}?>">
<label>
Upload Image
<input type="file" name="sfimg1">
</label>
</div><!-- col-md-9 ended -->
</div><!-- row ended -->
<div class="form-group">
Food Name
<input type="text" name="sfname"value="<?php if(isset($row16['sfname'])){echo$row16['sfname'];} ?>" class="form-control" required>
</div>
<div class="form-group">
Food Description
<input type="text" name="sfdesc" value="<?php if(isset($row16['sfdesc'])){echo$row16['sfdesc'];} ?>" class="form-control">
</div>
<div class="form-group">
Plate
<input type="text" name="plate" value="<?php if(isset($row16['plate'])){echo$row16['plate'];} ?>" class="form-control">
</div>
<div class="form-group">
Food Price
<input type="text" name="sfprice" value="<?php if(isset($row16['sfprice'])){echo$row16['sfprice'];} ?>" class="form-control" required>
</div>
<div class="form-group">
Food Discount
<input type="text" name="sfdiscount" class="form-control" value="<?php if(isset($row16['sfdiscount'])){echo$row16['sfdiscount'];}else{echo'0';} ?>" required>
</div>
<div class="form-group">
Shop Name
<input type="text" name="sfshopname" class="form-control" value="<?php if(isset($row16['sfshopname'])){echo$row16['sfshopname'];} ?>">
</div>
<div class="form-group">
Shop Mobile Number
<input type="text" name="sfshopmobilenum" class="form-control" value="<?php if(isset($row16['sfshopmobilenum'])){echo$row16['sfshopmobilenum'];} ?>">
</div>
<div class="form-group">
Shop Address
<input type="text" value="<?php if(isset($row16['sfshopadd'])){echo$row16['sfshopadd'];} ?>" name="sfshopadd" class="form-control">
</div>
<div class="form-group">
Shop Status 
<input type="text" name="sfshopstatus"value="<?php if(isset($row16['sfshopstatus'])){echo$row16['sfshopstatus'];} ?>" placeholder="open/close" class="form-control" required>
</div>
<div class="form-group">
<input type="submit" value="Update"  name="sub17" class="btn btn-danger btn-block">
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