<?php
session_start();
session_destroy();
session_unset();

echo "<script>alert('Logout Successfully');window.location='login.php';</script>";
?>