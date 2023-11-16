<?php  
require('db.php');
$_SERVER=[''];
session_unset();
session_destroy();
header("Location:login.php")
?>
