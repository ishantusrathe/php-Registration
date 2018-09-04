<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h1 class="text-primary text-uppercase text-center">Ajax Crude</h1>
  <div class="d-flex justify-content-end">
  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
 </div>
 
 
 
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajax Crud Operation</h4>
      </div>
      <div class="modal-body">
        
		   <div class="form-group">
              <label>First Name:</label>
			  <input type="text"  name="" id="fname" class="form-control" placeholder="Enter First Name">
            </div>
            
            <div class="form-group">
              <label>Last Name:</label>
			  <input type="text"  name="" id="lname" class="form-control" placeholder="Enter Last Name">
            </div>
           
		    <div class="form-group">
              <label>Email:</label>
			  <input type="text"  name="" id="email" class="form-control" placeholder="Enter Email-id">
            </div>
			 
			<div class="form-group">
              <label>Phone Number:</label>
			  <input type="text"  name="" id="phone" class="form-control" placeholder="Enter Phone Number">
            </div>  
			
		
		
      </div>
      <div class="modal-footer">
	    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="add_record()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!--update model-------------------------->

<div id="update_usermodel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajax Crud Operation</h4>
      </div>
      <div class="modal-body">
        
		   <div class="form-group">
              <label>First Name:</label>
			  <input type="text"  name="" id="up_fname" class="form-control" placeholder="Enter First Name">
            </div>
            
            <div class="form-group">
              <label>Last Name:</label>
			  <input type="text"  name="" id="up_lname" class="form-control" placeholder="Enter Last Name">
            </div>
           
		    <div class="form-group">
              <label>Email:</label>
			  <input type="text"  name="" id="up_email" class="form-control" placeholder="Enter Email-id">
            </div>
			 
			<div class="form-group">
              <label>Phone Number:</label>
			  <input type="text"  name="" id="up_phone" class="form-control" placeholder="Enter Phone Number">
            </div>  
			
		
		
      </div>
      <div class="modal-footer">
	    <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		<input type="hidden"  id="hidd_usr"> 
      </div>
    </div>

  </div>
</div>
 

 
 
 <h2 class="text-danger">All Records</h2>
 <div id="record_content">
 
 </div>
  
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 <script>
 $(document).ready(function()
 {
	 readrecords();
	 
 });
 
 function readrecords()
 //$(document).ready(function()
 {
	 
	var readrecord='readrecord';
	 $.ajax({
		 url:"backend1.php",
		 type:"post",
		 data:{readrecord:readrecord},
		 success:function(data,status)
		 {
			$('#record_content').html(data);
            // alert(data);  			
		 }
		 
		 
	 });
	 
 //});
 }
 
 
 function add_record()
 {
	 var fname=$('#fname').val();
	 var lname=$('#lname').val();
	 var email=$('#email').val();
	 var phone=$('#phone').val();
	 
	 $.ajax({
		 
		    url:'backend1.php',
			type:'post',
			data:{
				  fname:fname,
			      lname:lname,
                  email:email,
				  phone:phone
				  },
			success:function(data,status)
			{
				readrecords();
				//alert(data);

			}			
		 
		 
		 
	 }); 
	 
 }
 
 function edititem(edit_id)
 {
	 $('#hidd_usr').val(edit_id);
	 
	 
		    $.post('backend1.php',{edit_id:edit_id},
		      function(data,status)
			 {
				 var user =JSON.parse(data);
				 console.log(user);
				 
				 $('#up_fname').val(user.emp_fname);
				 $('#up_lname').val(user.emp_lname);
				 $('#up_email').val(user.emp_mail);
	             $('#up_phone').val(user.emp_phone);
               
			   
			  // alert(user);
				 
  			 }
			 );
		 
	    $('#update_usermodel').modal("show");	 
	
		
 }
 
 function deleie_item(deleie_item)
 {
	 var conf= confirm("are you sure");
	 $.ajax({
		 
		 url : 'backend1.php',
		 type: 'post',
		 data:{deleie_item:deleie_item},
		 success:function(data,status)
		 {
			 //alert(data);
			 readrecords();
		 }
		 
	 });
 }
 
 </script>
</body>
</html>
