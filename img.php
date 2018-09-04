<?php
if(isset($_POST['submit']))
{
	$nam=$_FILES['file']['name'];
	$tmp=$_FILES['file']['tmp_name'];
	$size = $_FILES['file'] ["size"];
	echo $size;
	$path="uploads/".$nam;
	
	move_uploaded_file($tmp,$path);
	//echo $path;
}
?>


<!Doctype html>
<html>
<head>
<title>Image Upload Program</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<input type="file" name="file"><br>
<input type="submit" name="submit">
</form>
</body>

</html>


