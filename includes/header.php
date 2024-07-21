<?php
include_once('conn.php');
if(!isset($_COOKIE['newuser'])){
setCookie("newuser","yes",time()+60*60*24*365);
$qupdate="update visitor_counter set count=count+1";
$run=mysqli_query($con,$qupdate);
}
?>
<!doctype html>
<html lang="en">
<head>
<title>FoodCrazzy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="image/foodcrazzy.png" type="image" rel="icon">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>
<div  id="header"><!-- header started -->
<?php
include_once('navbar.php');
?>