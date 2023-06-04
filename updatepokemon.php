<?php 
include 'conex.php';

$username=$_SESSION["username"];
$pokenumber=$_POST["pokenumber"];
$tabletarget=$_POST["tabletarget"];
$getdata=mysqli_query($mysqli,"SELECT $tabletarget from pokedex where idnumber=$pokenumber");
$dataarray=mysqli_fetch_array($getdata,MYSQLI_NUM);
$undoquery="UPDATE pokedex set $tabletarget = `$dataarray[0]` where idnumber = $pokenumber ";
if(!isset($_POST["nullbox"])){
$modbox=$_POST["modbox"];
$upquery="UPDATE pokedex set $tabletarget = '$modbox' where idnumber = $pokenumber";
}
else{
$upquery="UPDATE pokedex set $tabletarget = NULL where idnumber = $pokenumber";	
}
if($catch=mysqli_query($mysqli,$upquery)){
  	$title="Se han modificado los datos del pokemon ".$pokenumber." en el atributo ".$tabletarget;
  	if(isset($_POST["nullbox"])){
	$title="Se ha vaciado el atributo ".$tabletarget." del pokemon ".$pokenumber;
	}
	$error="Revisa los cambios en 'Información Local'";
	bringChangelog($username,$pokenumber,$title,$mysqli,$undoquery);
	$goref="informacion-local.php";
}
else{
	$title="No se pudo realizar la actualización";
	$error="Intenta de nuevo en otro momento";
	$goref="informacion-local.php";
}
include 'notice.php';
?>