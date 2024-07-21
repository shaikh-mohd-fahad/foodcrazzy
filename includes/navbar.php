<div class="navbar navbar-dark navbar-expand-md" style="background:#ff992b"><!-- navbar started -->
<div class="container"><!-- navbar container started -->
<a href="index.php" class="navbar-brand font-italic font-weight-bold">FoodCrazzy</a><small style="color:white"><i class="fas fa-map-marker-alt"></i> Bhitoli</small>
 <button class="navbar-toggler" data-toggle="collapse" data-target="#nclp"><i class="navbar-toggler-icon"></i></button> 
<div class="collapse navbar-collapse" id="nclp">
<ul class="nav navbar-nav ml-auto">
<li class="nav-item"><a href="profile.php" class="nav-link"><i class="fa fa-user"></i> <?php if(!isset($_COOKIE['umobilenum']) && !isset($_COOKIE['uname'])){echo"Profile";}else{echo$_COOKIE['uname'];}?></a></li>
<li class="nav-item"><button id="search" type="button" class="nav-link" data-toggle="collapse" data-target="#clp1" style="background:none;border:none;"><i class="fas fa-search"></i> Search</button></li>
 <?php if(!isset($_COOKIE['umobilenum']) && !isset($_COOKIE['uname'])){
	 ?>
<li class="nav-item"><a href="login.php" class="nav-link"><i class="fa fa-user"></i> Log in </a></li>
<?php
 }else{?>
<li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-user"></i> Logout</a></li> 
<?php
 }
 ?>
</ul>
</div>
</div><!-- navbar container ended -->
</div><!-- navbar ended -->
<div class="collapse " style="background:#ff992b"id="clp1">
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6 pb-2">
<center>
<form action="search.php" class="form-inline px-2" method="post">
<input type="search" class="form-control" placeholder="Search Street Food" name="searchfood" style="width:70%" required>
<input type="submit" class="btn ml-2" value="Search" style="width:25%">
</form>
</center>
</div>
<div class="col-sm-3"></div>
</div>
</div>