<?php
$menuitem="Ordered Food";
include_once('includes/header.php');
include_once('../conn.php');
?>
<div class="container-fluid mt-4"><!-- container started -->
<div class="row"><!-- row started -->
<!-- col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!-- col-md-2 sidebar menu ended -->

<div class="col-md-10"><!-- col-md-10 started -->
<?php
$q27="select * from orders order by 1 desc";
$run27=mysqli_query($con,$q27);
if(mysqli_num_rows($run27)>0){
?>
<div style="overflow-x:auto;">
<table class="table text-center table-bordered">
<tr>
<th>Image</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Food Type</th>
<th>User Name</th>
<th>Mobile</th>
<th>Address</th>
<th>Shop Name</th>
<th>Shop Address</th>
<th>Shop Mobile Num</th>
<th>Time</th>
<th>Date</th>
</tr>
<?php
while($row27=mysqli_fetch_array($run27)){
?>
<tr>
<th><img src="image/<?php echo$row27['ubpimg'];?>" class="img-fluid" style="max-width:120px;"></th>
<th><?php echo$row27['ubpname'];?></th>
<th><?php echo$row27['ubquantity'];echo" / ".$row27['plate'];?></th>
<th>&#8377;<?php echo$row27['ubprice'];?></th>
<th><?php echo$row27['ubfoodtype'];?></th>
<th><?php echo$row27['ubname'];?></th>
<th><?php echo$row27['ubmobilenum'];?></th>
<th><?php echo$row27['ubaddress'];?></th>
<th><?php echo$row27['shopname'];?></th>
<th><?php echo$row27['shopadd'];?></th>
<th><?php echo$row27['shopmobilenum'];?></th>
<th><?php echo$row27['top'];?></th>
<th><?php echo$row27['dop'];?></th>
</tr>
<?php
}
?>
</table>
</div>
<?php
}else{
	echo"0 order";
}
?>
</div><!-- col-md-10 ended -->
</div><!-- row ended -->
</div><!-- container ended -->
<?php
include_once('includes/footer.php');
?>