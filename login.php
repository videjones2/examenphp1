<?php 
include 'conex.php';
$username=$_POST["username"];
$pass=md5($_POST["pass"]);
$logquery=mysqli_query($mysqli,"SELECT * from users where username='$username'");
if($userarray=mysqli_fetch_array($logquery)){
	if($userarray["pass"]==$pass){
		$_SESSION["username"]=$username;
		header("location: contenido.php");
	}
	else{
		$title="Contraseña Incorrecta";
		$error="Intente otra vez";
	}
	
}
else{
	$title="Usuario no encontrado";
	$error="No existe ese nombre de usuario en la base de datos";
}

?>