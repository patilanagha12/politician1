<?php  

session_start();

include 'dbConfig.php';

if (!isset($_SESSION['adminid'])) 
{
	
	echo "<script>window.location='login.php';</script>";
}

?>0