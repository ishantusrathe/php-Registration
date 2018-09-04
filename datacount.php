<?php
include_once("connection.php");
session_start();
if(isset($_SESSION["uname"])==true)
{
$hide=$_SESSION["uname"];
//echo $hide;
$sql="select count(*) as counn  from mailing where m_unm='$hide'";
//echo $sql;
$row=mysqli_query($con,$sql);

$fet=mysqli_fetch_row($row);
print_r($fet[0]);


 
 

}
else
{
	
	header("Location:login.php");
}

?>