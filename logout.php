<?php
session_start();
if(isset($_SESSION["uname"]))
{
unset($_SESSION['name']); // will delete just the name data
session_destroy(); // will delete ALL data associated with that user.
header("Location:login.php");
}

?>