<?php
$conn=mysqli_connect('localhost','root','','crud_ajax');

//readrecords();

if(isset($_POST['readrecord']))
{
	$data ='<table class="table table-bordered table-striped">
	         <tr>
             <td>No.</td>
			 <td>Employee First Name</td>
			 <td>Employee Last Name</td>
			 <td>Email</td>
			 <td>Phone</td>
			 <td>Action</td>
			 </tr>';
			 
	$displaydata="select * from employee";
	$result= mysqli_query($conn,$displaydata);
	
	if(mysqli_num_rows($result) > 0)
	{
		$number=1;
		while($row=mysqli_fetch_array($result))
		{
			
		$data .='<tr>
		        <td>'.$number.'</td>
	            <td>'.$row['emp_fname'].'</td>
                <td>'.$row['emp_lname'].'</td>
                <td>'.$row['emp_mail'].'</td>
                <td>'.$row['emp_phone'].'</td>
				<td><button onclick="edititem('.$row['emp_id'].');" class="btn btn-success">Edit</button>
				<button onclick="deleie_item('.$row['emp_id'].');" class="btn btn-danger">Delete</button>
				.</td>
                </tr>';	
             $number++;				
		
	}
	
	}
	$data .='</table>';
	echo $data;
	
	//echo "Hello ishant";
	
}

extract($_POST);
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']))
{
 	$emp_fname=$_POST['fname'];
	$emp_lname=$_POST['lname'];
	$emp_email=$_POST['email'];
	$emp_phone=$_POST['phone'];
	$qry="insert into employee(emp_fname,emp_lname,emp_mail,emp_phone) 
	      values('$emp_fname','$emp_lname','$emp_email','$emp_phone')";
		
     //echo  		
	$qrry=mysqli_query($conn,$qry);	  
	
	return $qrry;
	
	
}


if(isset($_POST['deleie_item']))
{
	 $u_id=$_POST['deleie_item'];
	 $qry ="delete from employee where emp_id='$u_id'";
	 $qrry=mysqli_query($conn,$qry);
	 
	 //print_r($qrry);
}

if(isset($_POST['edit_id']))
{
	$usr_id=$_POST['edit_id'];
	
	$qry="select * from employee where emp_id='$usr_id'";
	
	/*$res=mysqli_query($conn,$qry);
	
	echo json_encode($res);*/
	if(!$result=mysqli_query($conn,$qry))
	{
		exit(mysqli_error());
	}
	$response=array();
	
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			
			$response=$row;
		}
		 echo json_encode($response);
		
	}
	
	else
		
		{
			$response['status']=200;
			$response['message']='data not found';
		}
	
	
	
		
}
?>