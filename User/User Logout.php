<?php
ob_start();  // to remove the header vala error
session_start();
unset($_SESSION['username']);   
header("Location:../User Login.php");

?>