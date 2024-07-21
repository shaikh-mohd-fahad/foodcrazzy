<?php 
include_once('includes/header.php');
?>
<a id="aa" href="index.php" style="font-size:20px" class="btn btn-success">Street  food</a>
<button class="btn btn-primary">Delivery Time: 11:00 am - 10:00 pm</button>
</div><!-- header ended -->

<div class="container mt-4" id="container"> <!-- row started -->
<h3 class="text-center text-danger mb-3">Order Tiffin </h3>
<div class="row"> <!-- row started -->
<?php 
$q11="select * from tiffin order by 1 desc";
$run11=mysqli_query($con,$q11);
while($row11=mysqli_fetch_array($run11)){
?>
<div class="col-md-4 col-sm-4 mb-4"> <!-- col-md-4 started -->

<div class="card shadow">
<img class="card-img" src="foodadmincraz/image/<?php echo$row11['tfimg1']; ?>">
<div class="card-body text-center">

<h6 class="text-center"style="color:#ff992bu"><?php echo$row11['tfname'];?></h6>
<p class="text-center">&#8377; <?php echo$row11['tfprice'];?> 
<?php if($row11['tfdiscount']>0){ ?><span class="text-success">(<?php echo$row11['tfdiscount'];?>% off)</span> <?php } ?></p>
<p>
<form action="buy.php" class="d-inline-block" method="post">
<input type="hidden" value="<?php echo$row11['tfid'];?>" name="tfid">
<button type="submit" class="btn btn-success" name="sub20">Buy</button>
</form>
</p>
</div>
</div>

</div> <!-- col-md-4 end -->
<?php
}
?>
</div> <!-- row end -->
</div> <!-- container ended -->


<?php
include_once('includes/footer.php');
?>