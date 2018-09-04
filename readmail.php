<?php
include_once("connection.php");
session_start();
if(isset($_SESSION["uname"])==true)
{
$hide=$_SESSION["uname"];
$sql="select * from mailing where m_unm='$hide'";
//echo $sql;
$row=mysqli_query($con,$sql);
$num=mysqli_num_rows($row);
if($num>0)
{
while($fet=mysqli_fetch_array($row))
{
	?>
  <tr>
  
  <td><?php echo $fet['m_mail'];?></td>
  <td><?php echo $fet['m_desc'];?></td>
  <td><img src="<?php echo $fet['m_image'];?>" height="100" width="100"></td>
  <td><?php echo $fet['m_time'];?></td>
  </tr>
	
	<?php
}
}
else
{
	?>
	<tr>
	
	<td colspan="4" align="center"><span>No Data Found</span></td>
 
   </tr>
	<?php
	}

}
?>