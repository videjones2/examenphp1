<?php 
include 'conex.php';

$username=$_SESSION["username"];
$pokenumber=$_POST["number"];
$name=$_POST["name"];
$photo=$_POST["photo"];
$summary=$_POST["summary"];
$abilityA=$_POST["abilityA"];
$abilityB=$_POST["abilityB"];
if($catch=mysqli_query($mysqli,"INSERT INTO pokedex(idnumber,pokename,photo,summary,abilityA,abilityB) values('$pokenumber','$name','$photo','$summary','$abilityA','$abilityB')")){
  $title="Se han capturado los datos del Pokemon ".$pokenumber.", ".$name;
	$error="Revisa los datos registrados en 'Información Local'";
	$undoquery="DELETE FROM pokedex WHERE idnumber = $pokenumber";
	bringChangelog($username,$pokenumber,$title,$mysqli,$undoquery);
	$goref="informacion-local.php";
}
else{
	$title="El Pokemon ya fue registrado";
	$error="Revisa los datos registrados en 'Información Local'";
	$goref="informacion-local.php";
}
include 'notice.php';
?>