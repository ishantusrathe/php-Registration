<?php
include_once("connection.php");
session_start();


if(isset($_SESSION["uname"])==true)
{
	
	 $unm=$_SESSION["uname"];
	 $qry="select * from register  left join categaries on register.reg_catid=categaries.cat_id where reg_unm='$unm'";
	 $res=mysqli_query($con,$qry);

	
	
	?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">



 <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compose Mail</h4>
        </div>
        <div class="modal-body">
          <div id="check">
		  <table class="table table-border-stripd">
           <thead>
		  <tr>
		  <th>Subject</th>
		  <th>Description</th>
		  <th>Image</th>
		  <th>Time</th>
          </tr>
          </thead>
		  <tbody id="change">
		  
		  
		  </tbody>
</table>
		  
		  </div>
        </div>
        <div class="modal-footer">
		
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compose Mail</h4>
        </div>
        <div class="modal-body">
          <div id="check">
		  <table class="table table-border-stripd">
<tr>
<th>Select User Email</th>
<td><input type="text" name="unm" id="unm" required></td>
</tr>
<tr>
<th>Enter User Subject</th>
<td><input type="email" name="mail" id="mail" required></td>
</tr>
<tr>
<th>Enter Description</th>
<td><textarea name="desc" id="desc" placeholder="Enter Mail Description"></textarea></td>
</tr>

<tr>
<th>Enter Attachment File</th>
<td><input type="file" name="file" id="file"></td>
<input type="hidden" name="hide" id="hide" value="<?php echo $unm ?>">
</tr>
</table>
		  
		  </div>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-primary" onclick="submitmail();">Compose</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  









<div class="row">
 <div class="col-sm-4">
<h2><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Add New Message</button></h2>
</div>
 <div class="col-sm-4">
<h2><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal3" onclick="readmail();"><span>New mail &nbsp;&nbsp;&nbsp;</span><span id="couu"></span></button></h2>
</div>
</div>
<table class="table table-border-stripd">
<tr>
<th>User Name</th>
<th>User Mail</th>
<th>User Phones</th>
<th>User Categir.</th>
</tr>
<?php
while($row=mysqli_fetch_array($res))
{
?>
<tr>
<td><?php echo $row['reg_unm'];?></td>
<td><?php echo $row['reg_mail'];?></td>
<td><?php echo $row['reg_mail'];?></td>
<td><?php echo $row['cat_name'];?></td>
</tr>


<?php
}
?>
</table>

<h2><a href="logout.php" class="btn btn-primary">Log Out</a></h2>
</div>


</body>
</html>


<?php	
}
else
{
header("Location:login.php");	
}


?>

<script>
function submitmail()
{
	var form_data=new FormData();
	var prop =document.getElementById("file").files[0];
	//var imagename=prop.name;
	var unm=$('#unm').val();
	var mail=$('#mail').val();
	var desc=$('#desc').val();
	
	form_data.append("file",prop);
	form_data.append("unm",unm);
	form_data.append("mail",mail);
	form_data.append("desc",desc);
	
	$.ajax({
	        type: 'POST',
            url: 'compose.php',
            data: form_data,
			contentType:false,
			cache:false,
			processData:false,
			success:function(result)
			{
				alert(result);
			}
	
	
	});
	
}
</script>

<script>
$(document).ready(function() 
{
	//lert("Hello");
	var hide =$('#hide').val();
	//alert(hide);
	$.ajax({
		
		type: 'POST',
		url : 'datacount.php',
		data:{hide:hide},
		success:function(result)
		{
			//alert(result);
			$('#couu').html(result)+ "yourmail";
			
		}
		
		
		
	});
	
});
</script>

<script>
function readmail()
{
	var hide =$('#hide').val();
	$.ajax({
		type:'POST',
		url : 'readmail.php',
		data: {hide:hide},
		success:function(result)
		{
		 // alert(result);	
			$('#change').html(result);
		}
		
		
	});
	
}

</script>