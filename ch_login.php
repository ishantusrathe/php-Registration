<?php 
include_once("connection.php");
 session_start();
$unm=$_POST['unm'];
$pass=$_POST['pass'];

$qry="select reg_unm,reg_pass from register where reg_unm ='$unm' and reg_pass='$pass'";
$login=mysqli_query($con,$qry);
$num=mysqli_num_rows($login);

if($num > 0)
{
   	
	$_SESSION["uname"]=$unm;
	echo 1;
	
}

else
{
	echo 0;
	
}


?>