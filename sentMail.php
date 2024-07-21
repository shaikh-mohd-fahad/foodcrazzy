<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
require"conn.php";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->Charset='UTF-8';
$mail->Username = 'noreply@foodcrazzy.com';
$mail->Password = 'Qwerty123***';
$mail->AddEmbeddedImage('sentimage/www.blogiez.com1.jpg','img1'); 
$mail->AddEmbeddedImage('sentimage/www.blogiez.com2.jpg','img2'); 
$mail->AddEmbeddedImage('sentimage/www.blogiez.com3.jpg','img3'); 
$mail->AddEmbeddedImage('sentimage/www.blogiez.com4.jpg','img4');
$mail->setFrom('noreply@foodcrazzy.com', 'Blogiez');
$mail->Subject = 'Start Your Blog for free';
//$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = '<img src="cid:img1"><br><img src="cid:img2"><br><img src="cid:img3"><br><img src="cid:img4"><br>';
//$mail->addReplyTo('test@hostinger-tutorials.com', 'Your Name');
//$mail->addAddress('blogiez.official@gmail.com');

if(isset($_GET['start'])){
	$start=$_GET['start'];
}
else{
	$start=0;
}
while($start<6){
	$run=mysqli_query($con,"SELECT * FROM `test` order by id limit $start,1");
	if(mysqli_num_rows($run)>0){
		while($row=mysqli_fetch_array($run)){
			$mail->addBCC($row['email']);
			echo ($start+1)." message sent to  ".$row['email']."<br>";
		}
	}
	$start+=1;
	if($mail->send()){
	    sleep(10);
		echo"<script>location.href='sentMail.php?start=".$start."';</script>";
		echo "<br>Message has been sent to 1 people<br>";
		exit();
	}else{
		echo "<br>Message could not be sent.";
	}
}
?>