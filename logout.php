<?php
if(isset($_COOKIE['umobilenum'])  && isset($_COOKIE['uname'])){
$umobilenum=$_COOKIE['umobilenum'];
$uname=$_COOKIE['uname'];
setcookie('umobilenum',"$umobilenum",time()-60*60*24*100);
setcookie('uname',"$uname",time()-60*60*24*100);
echo"<script>location.href='index.php';</script>";
}
?>