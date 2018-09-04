<?php 
include_once("connection.php");
$unm=$_POST['unm'];
$pass=$_POST['pass'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];
$catid=$_POST['catid'];
$sub_cat=$_POST['sub_cat'];

$insr="insert into register(reg_unm,reg_pass,reg_mail,reg_phone,reg_catid,reg_subid) values('$unm','$pass','$mail','$phone','$catid','$sub_cat')";
//echo $insr;

$add=mysqli_query($con,$insr);

  //print_r($add);
 if($add > 0)
 {
	 echo "DATA Successfully Submitted";
	
}
 else
 {
	echo "No connected";
 }
?>