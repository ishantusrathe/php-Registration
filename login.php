<!Doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

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

<td align="center " colspan="2"><button type="button" class="btn btn-primary" onclick="login();">Click</button></td>
</tr>

</div>

</body>
</html>
<script>
function login()
{
	var unm=$('#unm').val();
	var pass=$('#pass').val();
	
	if(unm=='')
	{
		alert('Enter User Name');
	}
	else if(pass == '')
	{
		alert('Enter Password');
		
	}
	else
	{
		$.ajax({
			
			type : 'POST',
			url  : 'ch_login.php',
			data :{unm:unm,pass:pass},
            success:function(result)
			{
                 //alert(result);
				 
				 if(result==1)
				 {
					 window.location.assign("http://localhost/coreimg/home.php");
				 }
				 else
				 {
					 alert("Check User Name And Password");
				 }
			}			
			
			
		});
	}

}
</script>