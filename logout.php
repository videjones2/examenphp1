<?php 
include 'conex.php';
unset($_SESSION["username"]);
header("location: contenido.php");
?>