<div class="col-md-2 bg-light mb-4" id="menu"><!-- col-md-2 started -->
<img src="<?php if(isset($img) && ($img!='') ){echo'image/'.$img;}else{echo'image/f4.png';} ?>" class="img-fluid w-100">
<ul class="nav nav-pills flex-column mt-4">
<li class="nav-item"><a href="profile.php" class="nav-link <?php if($menuitem=="Profile"){echo'active';} ?>">Profile</a></li>
<li class="nav-item"><a href="myorders.php" class="nav-link <?php if($menuitem=="My Orders"){echo'active';} ?>">My Orders</a></li>

</ul>
</div><!-- col-md-2 ended -->