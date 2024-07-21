<div class="col-md-2 bg-light" id="menu"><!-- col-md-2 started -->
<img src="image/f4.png" class="img-fluid">
<ul class="nav nav-pills flex-column mt-4">
<li class="nav-item"><a href="index.php" class="nav-link <?php if($menuitem=="Profile"){echo'active';} ?>">Profile</a></li>
<li class="nav-item"><a href="insertsfood.php" class="nav-link <?php if($menuitem=="Insert Street Food"){echo'active';} ?>">Insert Street Food</a></li>
<li class="nav-item"><a href="inserttiffin.php" class="nav-link <?php if($menuitem=="Insert Tiffin"){echo'active';} ?>">Insert Tiffin</a></li>
<li class="nav-item"><a href="tiffindetail.php" class="nav-link <?php if($menuitem=="Tiffin Detail"){echo'active';} ?>">Tiffin Detail</a></li>
<li class="nav-item"><a href="sfdetail.php" class="nav-link <?php if($menuitem=="Street Food Detail"){echo'active';} ?>">Street Food Detail</a></li>
<li class="nav-item"><a href="orderedfood.php" class="nav-link <?php if($menuitem=="Ordered Food"){echo'active';} ?>">Ordered Food</a></li>
</ul>
</div><!-- col-md-2 ended -->