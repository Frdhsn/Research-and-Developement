<?php 
session_start();
$_SESSION["mail"] =''; 
$_SESSION["fname"] =''; 
$_SESSION["id"] =''; 
$_SESSION["login"] =''; 
unset($_SESSION["mail"]); 
unset($_SESSION["fname"]); 
unset( $_SESSION["id"] ); 
unset($_SESSION["login"]); 
 session_destroy();
 header('location:index.php'); 
 ?>