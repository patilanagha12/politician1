<?php
include 'dbconfig.php';
session_start();
if (!isset($_SESSION['adminid']))
 {
echo "<script>window.location='../login.php'</script>";
}
?>