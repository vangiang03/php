<?php
$_SESSION['login_status']=false;
unset($_SESSION['login_status']);
header("location:login.php");
?>