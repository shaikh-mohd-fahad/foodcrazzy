<?php
$menuitem="Tiffin Detail";
include_once('includes/header.php');
if(isset($_POST['sub19'])){
	$tfid=$_POST['tfid'];
	$tfname=$_POST['tfname'];
	$tfdesc=$_POST['tfdesc'];
	$tfprice=$_POST['tfprice'];
	if(isset($_FILES['tfimg1']) && ($_FILES['tfimg1']['name']!='')){
	$tfimg1=$_FILES['tfimg1']['name'];
	$tfimg1tmp=$_FILES['tfimg1']['tmp_name'];
	}else{
	$tfimg1=$_POST['tmpimg'];
	$tfimg1tmp='';
	}
	$tfdiscount=$_POST['tfdiscount'];
	$tfshopname=$_POST['tfshopname'];
	$tfshopadd=$_POST['tfshopadd'];
	$tfday=$_POST['tfday'];
	$tftime=$_POST['tftime'];
	$q19="update tiffin set tfname='$tfname', tfdesc='$tfdesc', tfprice='$tfprice', tfdiscount='$tfdiscount', tfshopname='$tfshopname', tfshopadd='$tfshopadd', tfday='$tfday', tftime='$tftime',tfimg1='$tfimg1' where tfid='$tfid'";
	$run19=mysqli_query($con,$q19);
	if($run19){
		move_uploaded_file($tfimg1tmp,'image/'.$tfimg1);
		$msg="<div class='alert alert-success mt-4'> Update Succestfully </div>";
	}else{
		$msg="<div class='alert alert-danger mt-4'> Update Failed </div>";
	}
}
if(isset($_POST['sub18'])){
	$tfid=$_POST['tfid'];
	$q18="select * from tiffin where tfid='$tfid'";
	$run18=mysqli_query($con,$q18);
	$row18=mysqli_fetch_array($run18);
}
?>
<h4 class="text-center mt-4">View and Edit Tiffin Details</h4>
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
<img src="image/<?php if(isset($row18['tfimg1'])){echo$row18['tfimg1'];}?>" alt="food/tiffn image" class="img-fluid">
</div><!-- col-md-3 ended -->
<div class="col-md-9"><!-- col-md-9 started -->
<div class="form-group">
<input type="text" name="tfid" value="<?php if(isset($row18['tfid'])){echo$row18['tfid'];} ?>" readonly class="form-control">
</div>
<input type="hidden" name="tmpimg" value="<?php if(isset($row18['tfimg1'])){echo$row18['tfimg1'];}?>">
<label>
Upload Image
<input type="file" name="tfimg1">
</label>
</div><!-- col-md-9 ended -->
</div><!-- row ended -->
<div class="form-group">
Meal Name
<input type="text" name="tfname"value="<?php if(isset($row18['tfname'])){echo$row18['tfname'];} ?>" class="form-control" required>
</div>
<div class="form-group">
Meal Description
<input type="text" name="tfdesc" value="<?php if(isset($row18['tfdesc'])){echo$row18['tfdesc'];} ?>" class="form-control" >
</div>
<div class="form-group">
Price
<input type="text" name="tfprice" value="<?php if(isset($row18['tfprice'])){echo$row18['tfprice'];} ?>" class="form-control" required>
</div>
<div class="form-group">
Discount
<input type="text" name="tfdiscount" class="form-control" value="<?php if(isset($row18['tfdiscount'])){echo$row18['tfdiscount'];}else{echo'0';} ?>" >
</div>
<div class="form-group">
Shop Name
<input type="text" name="tfshopname" class="form-control" value="<?php if(isset($row18['tfshopname'])){echo$row18['tfshopname'];} ?>" required>
</div>
<div class="form-group">
Shop Address
<input type="text" value="<?php if(isset($row18['tfshopadd'])){echo$row18['tfshopadd'];} ?>" name="tfshopadd" class="form-control" >
</div>
<div class="form-group">
Day
<input type="text" value="<?php if(isset($row18['tfday'])){echo$row18['tfday'];} ?>" name="tfday" class="form-control">
</div>
<div class="form-group">
Time
<input type="text" value="<?php if(isset($row18['tftime'])){echo$row18['tftime'];} ?>" name="tftime" class="form-control">
</div>
<div class="form-group">
<input type="submit" value="Update"  name="sub19" class="btn btn-danger btn-block">
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