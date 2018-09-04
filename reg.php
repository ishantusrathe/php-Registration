<?php
include_once("connection.php");
$query="select * from categaries where cat_status=1";
$res=mysqli_query($con,$query);


$row=mysqli_num_rows($res);



?>

<!Doctype html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">





<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
		<table class="border border-stripd">
		<tr>
		<th>Sno.</th>
		<th>Categ. Name</th>
		</tr>
		<?php

		$sl=1;
		 while($result=mysqli_fetch_array($res))
		 {
		?>
		<tr>
		<td>
		 <?php echo $sl;?>
		 </td>
		 <td>
         <a onclick=catclick("<?php echo $result['cat_id'];?>"); data-toggle="modal" data-target="#myModal2" ><input type="hidden" id="catid" value="<?php echo $result['cat_id'];?>"><?php echo $result['cat_name'];?></a>
		  </td>
		  </tr>
		  <?php
		  $sl++;
		 }
		 ?>
		 </table>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


<!--Secound Modal-->



 <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <div id="check">


		  </div>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-primary" onclick="submitdata1();">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>




<table class="table table-border-stripd">
<tr>
<th>Enter User Name</th>
<td><input type="text" name="unm" id="unm" required></td>
</tr>
<tr>
<th>Enter User Password</th>
<td><input type="password" name="pass" id="pass" required></td>
</tr>
<tr>
<th>Ente User Email</th>
<td><input type="email" name="mail" id="mail" required></td>
</tr>
<tr>
<th>Enter User phone Number</th>
<td><input type="number" name="phone" id="phone" required></td>
</tr>
<tr>
<th colspan="2" align="center" ><button type="button" class="btn btn-primary" onclick="submitdata();">Click</button></th>
</tr>
</table>

</div>
</body>

<script>
function submitdata()
{
 var unm=$('#unm').val();
 var pass=$('#pass').val();
 var mail=$('#mail').val();
 var phone=$('#phone').val();

 if(unm== "" )
 {

	 alert('please enter all User Name Field');

 }
 else if(pass=="")
 {
	 alert('please enter password Field');

 }
 else if(mail=="")
 {
	 alert('please enter Eamil Field');

 }
 else if(phone=="")
 {
	 alert('please enter phone ');

 }
 else

	 {

		  $("#myModal").modal("show");


	 }

}
</script>

<script>
function catclick(cat_id)
{
$.ajax({
       type:'post',
	   url:'sub_catt.php',
	   data:{cat_id:cat_id},
	   success:function(result)
	   {
		  // alert(result);
		   $('#check').html(result);

		}



});


 };

</script>

<script>
function submitdata1()
{
 var unm=$('#unm').val();
 var pass=$('#pass').val();
 var mail=$('#mail').val();
 var phone=$('#phone').val();
 var catid=$('#catid').val();
 var sub_cat=$('#sub_cat').val();

 //alert(sub_cat);

 $.ajax({

	 type :'POST',
	 url  :'regiter.php',
	 data :{unm:unm,pass:pass,mail:mail,phone:phone,catid:catid,sub_cat:sub_cat},
	 success:function (result)
	 {
       alert(result);
       location.reload();
	 }



 });

}

</script>

</html>
