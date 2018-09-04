<?php
include_once("connection.php");
$unm=$_POST['unm'];
$nam=$_FILES['file']['name'];
$tmp=$_FILES['file']['tmp_name'];
$path="uploads/".$nam;
$mail =$_POST['mail'];
$desc =$_POST['desc'];
move_uploaded_file($tmp,$path);

$in="insert into mailing(m_unm,m_image,m_mail,m_desc)values('$unm','$path','$mail','$desc')";

$inset=mysqli_query($con,$in);

if($inset > 0)
{
	echo "Mail Sent";
}
else
{
	echo "Mail Not Sent";
}



?>