<?php 
include 'conex.php';

$username=$_SESSION["username"];
$pokenumber=$_POST["pokenumber"];
$getdata=mysqli_query($mysqli,"SELECT pokename,photo,summary,abilityA,abilityB from pokedex where idnumber=$pokenumber");
$dataarray=mysqli_fetch_array($getdata,MYSQLI_NUM);
$undoquery="INSERT INTO pokedex(idnumber,pokename,photo,summary,abilityA,abilityB) values(`$pokenumber`,`$dataarray[0]`,`$dataarray[1]`,`$dataarray[2]`,`$dataarray[3]`,`$dataarray[4]`)";
if($catch=mysqli_query($mysqli,"DELETE FROM pokedex WHERE idnumber = $pokenumber")){
  	$title="Se han eliminado los datos del pokemon ".$pokenumber.", ".$dataarray[0];
	$error="Revisa los cambios en 'Información Local'";
	bringChangelog($username,$pokenumber,$title,$mysqli,$undoquery);
	$goref="informacion-local.php";
}
else{
	$title="El Pokemon ya fue eliminado";
	$error="Revisa los cambios en 'Información Local'";
	$goref="informacion-local.php";
}
include 'notice.php';
?>