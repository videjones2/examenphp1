<?php 
include 'conex.php';
$logid=$_GET['logid'];
$logquery=mysqli_query($mysqli,"SELECT undoquery,dextarget from changelog where id='$logid'");
$getundo=mysqli_fetch_array($logquery);
$dextarget=$getundo['dextarget'];
$keyword=explode(" ",$getundo['undoquery'])[0];
switch ($keyword) {
    case 'DELETE':
      $getdata=mysqli_query($mysqli,"SELECT pokename,photo,summary,abilityA,abilityB from pokedex where idnumber=$dextarget");
      $dataarray=mysqli_fetch_array($getdata,MYSQLI_NUM);
      $newundo="INSERT INTO pokedex(idnumber,pokename,photo,summary,abilityA,abilityB) values(`$dextarget`,`$dataarray[0]`,`$dataarray[1]`,`$dataarray[2]`,`$dataarray[3]`,`$dataarray[4]`)";
      
    break;
  }
  $title="Se han deshecho los cambios del registro ".$logid;
  $error="El historial de cambios se ha actualizado"; 
  if($execundo=mysqli_query($mysqli,$getundo['undoquery'])){
      bringChangelog($username,$dextarget,$title,$mysqli,$newundo);
  }
include 'notice.php';
?>