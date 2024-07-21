<?php
//buy success page
//here we can insert details about purchase in table order as well ass show details to the user
if(!isset($_COOKIE['umobilenum'])&&!isset($_COOKIE['umobilenum'])){
	echo"<script>alert('Please login');</script>";
	echo"<script>location.href='login.php'</script>";
}
include_once('conn.php');
date_default_timezone_set("Asia/Kolkata");
// buy button on buy.php page
if(isset($_POST['sub24'])){
	//user bought product's id
	$ubpid=$_POST['ubpid'];
	//user's id
	$ubid=$_POST['ubid'];
	$date=date("Y-m-d");
	$time=date("h:i:sa");
	$ubemail=$_POST['ubemail'];
	$ubname=$_POST['ubname'];
	$ubquantity=$_POST['ubquantity'];
	$ubprice=$_POST['ubprice']*$_POST['ubquantity'];
	$ubmobilenum=$_POST['ubmobilenum'];
	$ubaddress=$_POST['ubaddress'];
	$ubfoodtype=$_POST['ubfoodtype'];
	//getting products image using product id 
	if($ubfoodtype=="tiffin"){
	$q25="select * from tiffin where tfid='$ubpid'";
	$run25=mysqli_query($con,$q25);
	$row25=mysqli_fetch_array($run25);
	//user bought product image
	$ubpimg=$row25['tfimg1'];
	//user bought product name
	$ubpname=$row25['tfname'];
	//Details of shop from where user bought the product
	$shopname=$row25['tfshopname'];
	$shopadd=$row25['tfshopadd'];
	$shopmobilenum=$row25['tfshopmobilenum'];
	}
	else{
	$q25="select * from streetfood where sfid='$ubpid'";
	$run25=mysqli_query($con,$q25);
	$row25=mysqli_fetch_array($run25);
	//user bought product image
	$ubpimg=$row25['sfimg1'];
	//user bought product name
	$ubpname=$row25['sfname'];
	//Details of shop from where user bought the product
	$shopname=$row25['sfshopname'];
	$shopadd=$row25['sfshopadd'];
	$shopmobilenum=$row25['sfshopmobilenum'];
	$plate=$row25['plate'];
	}
	//inserting all details in orders table
	$q24="insert into orders(ubid, ubname, ubemail, ubmobilenum, ubaddress, ubfoodtype, ubpid, ubpname, ubpimg, ubprice, ubquantity, shopname, shopadd, shopmobilenum,dop,top,plate) values('$ubid', '$ubname', '$ubemail', '$ubmobilenum', '$ubaddress', '$ubfoodtype', '$ubpid', '$ubpname', '$ubpimg', '$ubprice','$ubquantity', '$shopname', '$shopadd', '$shopmobilenum','$date','$time','$plate')";
	$run24=mysqli_query($con,$q24);
}
// cancel button on same page to cancel bought product
if(isset($_POST['sub34'])){
	$ubpid=$_POST['ubpid'];
	$ubid=$_POST['ubid'];
	$q34="delete from orders where ubid='$ubid' and ubpid='$ubpid'";
	$run34=mysqli_query($con,$q34);
	if($run34){
		echo"<script>alert('Your order is cancelled');</script>";
		echo"<script>location.href='index.php';</script>";
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Purchased Successfully</title>
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

<div class="container mt-4 shadow p-3 mb-5"><!-- container started -->
<?php if(isset($run24)){?>
<h4 class="text-center text-success">Order Purchased Successfully</h4> 
<div class="row mt-4"><!-- row started -->
<div class="col-5 col-md-3"> <!-- col-5 col-md-3 image started -->
<?php if(isset($ubpimg)){?>
<img src="foodadmincraz/image/<?php echo$ubpimg;?>" class="img-fluid">
<?php } ?>
</div> <!-- col-5 col-md-3 image ended -->
<div class="col-7 col-md-9"> <!-- col-7 col-md-9 purchased detail started -->

<h6 class="text-center"><?php if(isset($ubpname)){echo$ubpname;}?></h6>
<p>Price: &#8377;<?php if(isset($ubprice)){echo$ubprice;}?><br>
Quantity: <?php if(isset($ubquantity)){echo$ubquantity;}?>
</p>
<p>
<strong>Deliver To : </strong><br>
<?php if(isset($ubname)){echo$ubname;}?><br>
<?php if(isset($ubmobilenum)){echo$ubmobilenum;}?><br>
<?php if(isset($ubaddress)){echo$ubaddress;}?></p>
<p>Delivered Within 30-40 min</p>
<form action="" method="post">
<input type="hidden" value="<?php if(isset($ubid)){echo$ubid;} ?>" name="ubid">
<input type="hidden" value="<?php if(isset($ubpid)){echo$ubpid;} ?>" name="ubpid">
<div class="form-group">
<input type="submit" class="btn btn-danger" value="Cancel Order" name="sub34">
<a href="index.php" class="btn btn-primary">Order More Foods</a>
</div>
</form>

</div><!-- col-7 col-md-9 purchased detail ended -->
</div><!-- row ended -->
<?php 
}else{
	echo"Order Not Purchased";
}
?>
</div><!-- container ended -->
<?php
include_once('includes/footer.php');
?>