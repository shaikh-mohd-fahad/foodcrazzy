<?php 
include_once('includes/header.php');
?>
<button id="aa" class="btn btn-primary">Delivery Time: 11:00 am - 8:00 pm</button>
</div><!-- header ended -->
<div class="container mt-4" id="container"> <!-- container started -->
<h3 class="text-center text-danger mb-3">Street Food </h3>
<div class="row"> <!-- row started -->
<?php
$q10="select * from streetfood order by 1 desc";
$run10=mysqli_query($con,$q10);
while($row10=mysqli_fetch_array($run10)){
?>
<div class="col-md-4 col-sm-4 mb-4"> <!-- col-md-4 started -->
<div class="card-deck">
<div class="card shadow">
<img class="card-img" src="foodadmincraz/image/<?php echo$row10['sfimg1'];?>">
<div class="card-body text-center">
<h6 class="text-center"style="padding:0px;margin:0px"><?php echo$row10['sfname'];?></h6>
<span style="font-size:13px; padding:0px; margin:0px" id="sp1">-By <?php echo$row10['sfshopname'];?></span>
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
<?php } ?>

</div> <!-- row end -->
</div> <!-- container ended -->


<?php
include_once('includes/footer.php');
?>