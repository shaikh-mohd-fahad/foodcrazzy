<?php
include_once('conn.php');
?>
<!doctype html>
<html lang="en">
<head>
<title>FoodCrazzy Search Results </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="image/foodcrazzy.png" type="image" rel="icon">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>

<div  id="header" style="background:none;min-height:0px;;"><!-- header started -->
<?php
include_once('includes/navbar.php');
?>
</div><!-- header ended -->

<div class="container mt-4" id="container"> <!-- container started -->
<h3 class="text-center text-danger mb-3">Showing Search Result</h3>
<div class="row"> <!-- row started -->
<?php
if(isset($_POST['searchfood'])){
$searchfood=$_POST['searchfood'];
$q10="select * from streetfood where sfname like '%$searchfood%' or sfdesc like '%$searchfood%' order by 1 desc";
$run10=mysqli_query($con,$q10);
if(mysqli_num_rows($run10)>0){
while($row10=mysqli_fetch_array($run10)){
?>
<div class="col-md-4 col-sm-4 mb-4"> <!-- col-md-4 started -->
<div class="card-deck">
<div class="card shadow">
<img class="card-img" src="foodadmincraz/image/<?php echo$row10['sfimg1'];?>">
<div class="card-body text-center">
<h6 class="text-center"style="color:#ff992bu; padding:0px;margin:0px"><?php echo$row10['sfname'];?></h6>
<span style="font-size:13px; padding:0px; margin:0px">-By <?php echo$row10['sfshopname'];?></span>
<p class="text-center"><span class="font-weight-bold">&#8377; <?php echo$row10['sfprice'];?></span>
<?php if($row10['sfdiscount']>0){ ?><span class="text-success">(<?php echo$row10['sfdiscount'];?>% off) <?php } ?></span> <?php if($row10['plate']!=''){echo"(".$row10['plate'].")";}?> </p>
<p>
<form action="buy.php" class="d-inline-block" method="post">
<input type="hidden" value="<?php echo$row10['sfid'];?>" name="sfid">
<button type="submit" class="btn btn-success " name="sub20">Buy</button>
</form>
</p>
</div>
</div>
</div>
</div> <!-- col-md-4 end -->
<?php }}
else{
	echo"Sorry we not found what you want";
}
}else{
	echo"Please Search Something";
} ?>

</div> <!-- row end -->
</div> <!-- container ended -->

<!-- all js link -->
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>