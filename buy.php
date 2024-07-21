<?php
include_once('conn.php');
if(isset($_COOKIE['umobilenum'])&& isset($_COOKIE['uname'])){
	//getting user detail to show user whether there information is correct or not
	$q21="select * from userlogin where umobilenum=".$_COOKIE['umobilenum'];
	$run21=mysqli_query($con,$q21);
	$row21=mysqli_fetch_array($run21);
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Buy Your Order</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta property="og:url"           content="https://www.foodcrazzy.com/buy.php" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="my Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="http://foodcrazzy.com/foodadmincraz/image/IMG_20200228_102047_094.jpg" />
<link href="image/foodcrazzy.png" type="image" rel="icon">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '336927400705991',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v8.0'
    });
  };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<div  id="header"style="background:none;min-height:auto"><!-- header started -->
<?php 
include_once('includes/navbar.php');
?>
</div><!-- header ended -->
<?php
//getting details of the food 

if(isset($_POST['sfid'])){// buy button on index.php  page
	$id=$_POST['sfid'];

	$q20="select * from streetfood where sfid='$id'";
	$run20=mysqli_query($con,$q20);
	$row20=mysqli_fetch_array($run20);
	$img1=$row20['sfimg1'];
	$name=$row20['sfname'];
	$desc=$row20['sfdesc'];
	$price=$row20['sfprice'];
	$foodtype=$row20['ftype'];
	$discount=$row20['sfdiscount'];
	$shopname=$row20['sfshopname'];
	$shopstatus=$row20['sfshopstatus'];
	$plate=$row20['plate'];
}
if(isset($_POST['tfid'])){// submit button on tiffinservice.php page
	$id=$_POST['tfid'];
	$q20="select * from tiffin where tfid='$id'";
	$run20=mysqli_query($con,$q20);
	$row20=mysqli_fetch_array($run20);
	$img1=$row20['tfimg1'];
	$name=$row20['tfname'];
	$desc=$row20['tfdesc'];
	$price=$row20['tfprice'];
	$foodtype=$row20['ftype'];
	$discount=$row20['tfdiscount'];
}
?>
<div class="container"> <!-- container started -->
<div class="row py-3"> <!-- row started -->
<div class="col-5 col-md-3"> <!-- col-5 col-md-3 image started -->
<?php if(isset($img1)){?>
<img src="foodadmincraz/image/<?php echo$img1;?>" class="img-fluid">
<?php } ?>
</div> <!-- col-5 col-md-3 image ended -->
<div class="col-7 col-md-9"> <!-- col-7 col-md-9 image detail started -->
<h5 class=""><?php if(isset($name)){echo$name;}?></h5>
<small><h6 class="">&#8377; <?php if(isset($price)){echo$price;}?><span > <?php if(isset($plate))echo"(".$plate.")";?></span> 
<?php if($discount>0){ ?>
<span style="color:green">(<?php if(isset($discount)&&($discount>0)){echo$discount;}?>%)</span><?php }?>
</h6></small>
<p><?php if(isset($desc)){echo$desc;}?></p>
<p><?php if(isset($shopname)){echo"Shope Name: ".$shopname;}?></p>
<p><?php if(isset($shopstatus)){if($shopstatus=="open" || $shopstatus=="Open"){echo"Shope Status: ".$shopstatus;}else{echo"Shope Status: <span class='text-danger font-weight-bold'>**Close</span>";}}?></p>
<!-- form started -->
<form action="buysuccess.php" method="post">
<input type="hidden" name="plate" value="<?php if(isset($plate))echo$plate; ?>">
<p class="d-inline-block"><strong>Quantity</strong> = <input type="text" class="form-control d-inline-block w-50" onkeypress="isInputNumber(event)" onkeyup="fun1(this.value)" required value="1" name="ubquantity"> </p>
<p><strong>Total Price</strong> = &#8377; <span id="show"><?php if(isset($price))echo$price;?></span>
<input type="hidden" name="ubprice" value="<?php if(isset($price)){echo$price;}?>">
<input type="hidden" name="ubfoodtype" value="<?php if(isset($foodtype)){echo$foodtype;}?>">
<br>Pay : Cash on Delivery
</p>

</div> <!-- col-7 col-md-9 image detail ended -->
</div> <!-- row ended -->
<div class="row">
<div class="col-md-12">
<?php
//check whether user is login or not. If user is not login then send user to the login page. but if user is log in then user can buy product directly by clicking on the buy button
?>
<h6 class="h6 text-center mt-4 mb-4 font-weight-bold bg-primary p-2 text-white">Please Check all your Information</h6>
<div class="fb-share-button" data-href="http://foodcrazzy.com/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffoodcrazzy.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
<!-- u =user , b=buy/bought -->
<input type="hidden" class="" name="ubid" value="<?php if(isset($row21['uid'])){echo$row21['uid'];}?>">
<!-- user bought product's id -->
<input type="hidden" class="" name="ubpid" value="<?php if(isset($id)){echo$id;}?>">
<div class="form-group">
<strong>Name</strong>
<input type="text" class="form-control" name="ubname" value="<?php if(isset($row21['uname'])){echo$row21['uname'];}?>" readonly placeholder="Name" >
</div>
<div class="form-group">
<strong>Email</strong>
<input type="text" class="form-control" name="ubemail" value="<?php if(isset($row21['uemail'])){echo$row21['uemail'];}?>" readonly  placeholder="Email">
</div>
<div class="form-group">
<strong>Mobile Number</strong>
<input type="text" class="form-control" name="ubmobilenum" value="<?php if(isset($row21['umobilenum'])){echo$row21['umobilenum'];}?>" readonly  placeholder="Mobile Number">
</div>
<div class="form-group">
<strong>Address</strong>
<input type="text" class="form-control" name="ubaddress" value="<?php if(isset($row21['uaddress'])){echo$row21['uaddress'];}?>" readonly  placeholder="Address">
</div>
<div class="form-group">
<input type="submit" name="sub24" value="Buy" class="btn btn-danger" <?php if(isset($shopstatus)) {if(($shopstatus!="open") && ($shopstatus!="Open")){echo"disabled";}} ?> >
<a href="profile.php" class="right btn btn-success">Update info</a> 
</div>
</form>
</div>
</div>
</div> <!-- container ended -->
<script>
function fun1(quantity){	
	if(quantity.length==0){
		document.getElementById("show").innerHTML="Please Enter Quantity";
	}
	else{
    var req=new XMLHttpRequest(); 
	req.open('GET',"https://www.foodcrazzy.com/foodadmincraz/serverPriceCal.php?q="+quantity+"&price=<?php echo$price;?>",true);
    req.send();
    
    req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200){
    document.getElementById("show").innerHTML=req.responseText;
        }
    }
	}
}
function isInputNumber(evt){
	var ch= String.fromCharCode(evt.which);
	if(!(/[0-9]/.test(ch))){
		evt.preventDefault();
	}
}
</script>
<?php
include_once('includes/footer.php');
?>