<?php
//This is server page for ajax
$quantity=$_GET['q'];
$price =$_GET['price'];
$price=$quantity*$price;
echo($price);
//This is server page for ajax
?>