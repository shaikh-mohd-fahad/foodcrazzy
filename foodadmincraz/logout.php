<?php
session_start();
if(!isset($_SESSION['email'])){
	echo"<script>window.location='login.php';</script>";
}
session_destroy();
	echo"<script>window.location='../index.php';</script>";
?>