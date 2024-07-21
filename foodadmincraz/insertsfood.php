<?php
$menuitem="Insert Street Food";
include_once('includes/header.php');
$email=$_SESSION['email'];

if(isset($_POST['sub8'])){
	$sfname=$_POST['sfname'];
	$sfdesc=$_POST['sfdesc'];
	$sfprice=$_POST['sfprice'];
	$sfdiscount=$_POST['sfdiscount'];
	if($_FILES['sfimg1']['name']!=""){
	$sfimg1=$_FILES['sfimg1']['name'];
	$sfimg1temp=$_FILES['sfimg1']['tmp_name'];
	}else{
	$sfimg1="not_available.jpg";
	$sfimg1temp="";}
	$sfshopname=$_POST['sfshopname'];
	$sfshopadd=$_POST['sfshopadd'];
	$sfshopmobilenum=$_POST['sfshopmobilenum'];
	$sfshopstatus=$_POST['sfshopstatus'];
	$ftype=$_POST['ftype'];
	$plate=$_POST['plate'];
	$q8="insert into streetfood(sfname, sfdesc, sfprice, sfdiscount, sfimg1, sfshopname, sfshopadd, sfshopstatus,ftype, sfshopmobilenum,plate) values('$sfname', '$sfdesc', '$sfprice', '$sfdiscount', '$sfimg1', '$sfshopname', '$sfshopadd', '$sfshopstatus','$ftype','$sfshopmobilenum','$plate')";
	$run8=mysqli_query($con,$q8);
	if($run8){
		move_uploaded_file($sfimg1temp,"image/".$sfimg1);
		$msg="<div class='mt-4 alert alert-success'>Streat Food Added Successfully</div>";
	}else{
		$msg="<div class='mt-4 alert alert-danger'>Streat Food Not Added</div>";
	}
}
?>
<h4 class="text-center mt-4">Insert Street Food</h4>
<div class="container mt-4"><!-- container started -->
<div class="row"><!-- row started -->
<!-- col-md-2 sidebar menu started -->
<?php
include_once('includes/sidebarmenu.php');
?>
<!-- col-md-2 sidebar menu ended -->
<div class="col-md-10"><!-- col-md-10 started -->
<form class="" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
Food Name
<input type="text" name="sfname" class="form-control" required>
</div>
<div class="form-group">
Food Description
<input type="text" name="sfdesc" class="form-control" >
</div>
<div class="form-group">
Food Price
<input type="text" name="sfprice" class="form-control" required>
</div>
<div class="form-group">
Food Discount
<input type="text" value="0" name="sfdiscount" class="form-control" >
</div>
<div class="form-group">
Food Quantity
<input type="text" value="half plate" name="plate" class="form-control" required placeholder="half/full plate">
</div>
<div class="form-group">
<input type="hidden" name="ftype" value="street food" class="form-control" required>
</div>
<div class="row">
<div class="col-md-3 text-left"> <!-- col-md-3 start -->
<div class="form-group">
Select Image :
</div>
</div> <!-- end col-md-3 end -->
<div class="col-md-3"> <!-- col-md-3 start -->
<div class="form-group">
<label class="">Image
<input type="file" name="sfimg1" class=""></label>
</div>
</div>
</div><!-- row ended -->
<div class="form-group">
Shop Name
<select name="sfshopname" class="form-control" onchange="f2(this.value)">
<option>Select Shop Name</option>
<option>Bala Ji Fast Food</option>
<option>Bhavya</option>
<option>Vijay Chawmin Waale</option>
<option>Shama Muradabadi Biryani</option>
</select>
</div>
<p id="show"></p>
<div class='form-group'>
Shop Status 
<input type='text' name='sfshopstatus' placeholder='open/close' value="open" class='form-control' required>
</div>
<div class='form-group'>
<input type='submit' value='Add Food'  name='sub8' class='btn btn-danger btn-block'>
</div>
</form>
<?php
if(isset($msg)){
echo$msg;}
?>
</div><!-- col-md-10 ended -->
</div><!-- row ended -->
</div><!-- container ended -->
<script>
function f2(shopname){
	var req=new XMLHttpRequest(); 
	req.open('GET',"https://www.foodcrazzy.com/foodadmincraz/shopserver.php?shopname="+shopname,true);
    req.send();
    
    req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200){
    document.getElementById("show").innerHTML=req.responseText;
	}}
}
</script>
<?php
include_once('includes/footer.php');
?>