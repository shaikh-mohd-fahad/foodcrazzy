<?php
//my order page
if(!isset($_COOKIE['umobilenum'])&&!isset($_COOKIE['uname'])){
	echo"<script>location.href='login.php'</script>";
}
include_once('conn.php');

// getting user detail to show detail to the user on the profile page on sidebar
$q22="select * from userlogin where umobilenum=".$_COOKIE['umobilenum'];
$run22=mysqli_query($con,$q22);
$row22=mysqli_fetch_array($run22);
$img=$row22['uimage'];
//gettting users id
$ubid=$row22['uid'];
//deleting/canceling users product
if(isset($_POST['sub35'])){
	$ubid=$_POST['ubid'];
	$order_id=$_POST['order_id'];
	$q35="delete from orders where order_id='$order_id' and ubid='$ubid'";
	$run35=mysqli_query($con,$q35);
	if($run35){
		echo"<script>alert('Order Deleted Successfully');</script>";
	}else{
		echo"<script>alert('Order not Deleted');</script>";
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<title>My Orders</title>
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

<h4 class="text-center mt-4">Welcome <?php echo$_COOKIE['uname'];?> to the My Orders</h4>
<p class="text-danger text-center">**By Clicking on delete butotn if The order is not delivered it will cancel your order </p>
<div class="container mt-4 mb-5 p-3"><!-- container started -->
<div class="row"><!-- row started -->
<!--included col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!--included col-md-2 sidebar menu ended -->
<div class="col-md-10"><!-- col-md-10 started -->
<?php
//getting users purchased order
$q26="select * from orders where ubid='$ubid'";
$run26=mysqli_query($con,$q26);
if(mysqli_num_rows($run26)>0){
?>
<div class="table-responsive-sm">
<table class="table text-center">
<tr>
<th>Image</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Action</th>
</tr>
<?php
while($row26=mysqli_fetch_array($run26)){
?>
<tr>
<th><img src="foodadmincraz/image/<?php echo$row26['ubpimg'];?>" class="img-fluid" style="max-width:120px;"></th>
<td><?php echo$row26['ubpname'];?></td>
<td><?php echo$row26['ubquantity']." / (".$row26['plate'].")";?></td>
<td>&#8377;<?php echo$row26['ubprice'];?></td>
<td><form action="" method="post">
<input name="order_id" type="hidden" value="<?php echo$row26['order_id'];?>">
<input name="ubid" type="hidden" value="<?php echo$row26['ubid'];?>">
<button type="submit" name="sub35"class="btn btn-primary"><i class="fa fa-trash"></i></button>
</form></td>
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