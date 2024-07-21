<?php
include_once('../conn.php');
$shopname=$_GET['shopname'];
$q33="select * from streetfood where sfshopname='$shopname'";
$run33=mysqli_query($con,$q33);
if(mysqli_num_rows($run33)>0){
$row33=mysqli_fetch_array($run33);
echo"
<div class='form-group'>
Shop Mobile Number
<input type='text' name='sfshopmobilenum' class='form-control' value='".$row33['sfshopmobilenum']."'>
</div>
<div class='form-group'>
Shop Address
<input type='text' name='sfshopadd' class='form-control' value='".$row33['sfshopadd']."'>
</div>
";}
else{
echo"
<div class='form-group'>
Shop Mobile Number
<input type='text' name='sfshopmobilenum' class='form-control'>
</div>
<div class='form-group'>
Shop Address
<input type='text' name='sfshopadd' class='form-control'>
</div>
";	
}
?>