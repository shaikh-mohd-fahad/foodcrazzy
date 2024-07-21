<?php
$menuitem="Tiffin Detail";
include_once('includes/header.php');
if(isset($_POST['sub15'])){
	$tfid=$_POST['tfid'];
	$q15="delete from tiffin where tfid='$tfid'";
	$run15=mysqli_query($con,$q15);
}
?>
<h4 class="text-center mt-4">Tiffin Details</h4>
<div class="container-fluid mt-4"><!-- container started -->
<div class="row"><!-- row started -->
<!-- col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!-- col-md-2 sidebar menu ended -->
<div class="col-md-10"><!-- col-md-10 started -->
<?php
$q12="select * from tiffin";
$run12=mysqli_query($con,$q12);
if(mysqli_num_rows($run12)>0){
?>
<div class="table-responsive">
<table class="text-center table table-bordered">
<tr>
<th>Image</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Discount</th>
<th>Food Type</th>
<th>Day</th>
<th>Time</th>
<th>Shop Name</th>
<th>Shop Address</th>
<th>Action</th>
</tr>
<?php
while($row12=mysqli_fetch_array($run12)){
?>
<tr>
<td><img src="image/<?php echo$row12['tfimg1'];?>" class="img-fluid" height="150px" width="200px"></td>
<td><?php echo$row12['tfname'];?></td>
<td><?php echo$row12['tfdesc'];?></td>
<td><?php echo$row12['tfprice'];?></td>
<td><?php echo$row12['tfdiscount'];?>%</td>
<td><?php echo$row12['ftype'];?></td>
<td><?php echo$row12['tfday'];?></td>
<td><?php echo$row12['tftime'];?></td>
<td><?php echo$row12['tfshopname'];?></td>
<td><?php echo$row12['tfshopadd'];?></td>
<td class="text-left">
<form action="viewtfdetail.php" class="d-inline" method="post">
<input type="hidden" name="tfid" value="<?php echo$row12['tfid'];?>"> 
<button class="btn btn-primary" id="btn1" type="submit" name="sub18"><i class="fa fa-pen"></i></button>
</form>
<form action="" class="d-inline" method="post">
<input type="hidden" name="tfid" value="<?php echo$row12['tfid'];?>"> 
<button class="btn btn-secondary" name="sub15" type="submit" id="btn1"><i class="fa fa-trash"></i></button>
</form>
</td>
</th>
<?php
}?>
</table>
</div>
<?php
}else{
	echo" 0 details available in tiffin";
}
?>
</div><!-- col-md-10 ended -->
</div><!-- row ended -->
</div><!-- container ended -->

<?php
include_once('includes/footer.php');
?>