<?php
$menuitem="Street Food Detail";
include_once('includes/header.php');
if(isset($_POST['sub14'])){
	$sfid=$_POST['sfid'];
	$q14="delete from streetfood where sfid='$sfid'";
	$run14=mysqli_query($con,$q14);
}
?>
<h4 class="text-center mt-4">Street Food Details</h4>
<div class="container-fluid mt-4"><!-- container started -->
<div class="row"><!-- row started -->
<!-- col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!-- col-md-2 sidebar menu ended -->
<div class="col-md-10"><!-- col-md-10 started -->
<?php
$q13="select * from streetfood";
$run13=mysqli_query($con,$q13);
if(mysqli_num_rows($run13)>0){
?>
<div class="table-responsive">
<table class="text-center table table-bordered">
<tr>
<th>Image</th>
<th>Name</th>
<th>Description</th>
<th>Quantity</th>
<th>Price</th>
<th>Discount</th>
<th>Food Type</th>
<th>Shop Name</th>
<th>Shop Address</th>
<th>Shop Mobile</th>
<th>Shop Status</th>
<th>Action</th>
</tr>
<?php
while($row13=mysqli_fetch_array($run13)){
?>
<tr>
<td><img src="image/<?php echo$row13['sfimg1'];?>" class="img-fluid" height="100px" width="200px"></td>
<td><?php echo$row13['sfname'];?></td>
<td><?php echo$row13['sfdesc'];?></td>
<td><?php echo$row13['plate'];?></td>
<td><?php echo$row13['sfprice'];?></td>
<td><?php echo$row13['sfdiscount'];?>%</td>
<td><?php echo$row13['ftype'];?></td>
<td><?php echo$row13['sfshopname'];?></td>
<td><?php echo$row13['sfshopadd'];?></td>
<td><?php echo$row13['sfshopmobilenum'];?></td>
<td><?php echo$row13['sfshopstatus'];?></td>
<td class="text-left">
<form action="viewsfdetail.php" class="d-inline" method="post">
<input type="hidden" name="sfid" value="<?php echo$row13['sfid'];?>"> 
<button class="btn btn-primary" name="sub16" id="btn1" type="submit"><i class="fa fa-pen"></i></button>
</form>
<form action="" class="d-inline" method="post">
<input type="hidden" name="sfid" value="<?php echo$row13['sfid'];?>"> 
<button class="btn btn-secondary" name="sub14" type="submit" id="btn1"><i class="fa fa-trash"></i></button>
</form>
</td>
</th>
<?php
}?>
</table>
</div>
<?php
}else{
	echo" 0 details available in street food";
}
?>
</div><!-- col-md-10 ended -->
</div><!-- row ended -->
</div><!-- container ended -->

<?php
include_once('includes/footer.php');
?>