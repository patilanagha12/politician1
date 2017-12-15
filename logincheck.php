<?php
include 'dbconfig.php';
extract($_POST);

if(isset($_POST['login']))
{

	$pass1=md5($pass);
  $sql = "SELECT * FROM admin WHERE uname = '$uname' and password='$pass1'";
  $result = mysqli_query($db,$sql);
  $a=mysqli_num_rows($result);
      
	if (mysqli_num_rows($result) > 0) 
    {
     if($row1 = mysqli_fetch_assoc($result)) 
       {
        session_start();
        $_SESSION['adminid']=$row1['adminid'];
        echo"<script> alert('Login Successfully');window.location='admin/index.php';</script>";
       }
    }
}
?>