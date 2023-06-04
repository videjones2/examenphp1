<?php 
include 'conex.php';
$logid=$_GET['logid'];
$logquery=mysqli_query($mysqli,"SELECT autor,undoquery,dextarget from changelog where id='$logid'");
$getundo=mysqli_fetch_array($logquery);
if($username==$getundo['autor']){
$title="Los cambios se han deshecho ";
$error="El historial de cambios se ha actualizado"; 
$dextarget=$getundo['dextarget'];
$keyword=explode(" ",$getundo['undoquery'])[0];
switch ($keyword) {
    case 'DELETE':
      $getdata=mysqli_query($mysqli,"SELECT pokename,photo,summary,abilityA,abilityB from pokedex where idnumber=$dextarget");
      $dataarray=mysqli_fetch_array($getdata,MYSQLI_NUM);
      $newundo="INSERT INTO pokedex(idnumber,pokename,photo,summary,abilityA,abilityB) values(`$dextarget`,`$dataarray[0]`,`$dataarray[1]`,`$dataarray[2]`,`$dataarray[3]`,`$dataarray[4]`)";
      $logtitle=$title.". Los datos del Pokemon ".$dextarget." han sido eliminados";
    break;
    case 'INSERT':
      $newundo="DELETE FROM pokedex WHERE idnumber=$dextarget";
      $logtitle=$title.". Los datos del Pokemon ".$dextarget." han sido restaurados";
    break;
    case 'UPDATE':
      $tabletarget=explode(" ",$getundo['undoquery'])[3];
      $getdata=mysqli_query($mysqli,"SELECT $tabletarget from pokedex where idnumber = $dextarget");
      $dataarray=mysqli_fetch_array($getdata,MYSQLI_NUM);
      $newundo="UPDATE pokedex set $tabletarget = `$dataarray[0]` where idnumber = $dextarget ";
      $logtitle=$title.". Los datos del Pokemon ".$dextarget." han sido modificados en el atributo ".$tabletarget;
  }
  $realundo=str_replace("`","'",$getundo['undoquery']);
  if($execundo=mysqli_query($mysqli,$realundo)){
      bringChangelog($username,$dextarget,$logtitle,$mysqli,$newundo);
  }
  else{

    $title="Ocurrio un error al deshacer el cambio";
    $error="Intenta de nuevo en otro momento";
  }
}
else{
  $title="Acceso Denegado";
  $error="Solo el autor de este registro puede revertir los cambios";
}
include 'notice.php';

?>