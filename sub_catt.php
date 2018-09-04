<?php
include_once("connection.php");
if(isset($_POST['cat_id']))
{
$cat_id=$_POST['cat_id'];	
	
	
$sql="select * from sub_cat where cat_id ='$cat_id'";

$qry=mysqli_query($con,$sql);
while($result=mysqli_fetch_array($qry))
{
?>
<input type="checkbox" name="sub_cat" id="sub_cat" value="<?php echo $result['sub_id'];?>"><?php echo $result['sub_name'];?>
<?php
}
}
?>