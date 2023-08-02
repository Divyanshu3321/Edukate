<?php
ob_start();  // to remove the header vala error
session_start();
unset($_SESSION['username']);   // destroy the session
header("Location:../Developer Login.php");

?>