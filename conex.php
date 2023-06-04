<?php
session_start();
$mysqli = mysqli_connect('localhost','yourusername','yourpassword','examenphp');//datos de conexion a la base de datos
$mysqli -> set_charset("utf8");
if(isset($_SESSION["username"])){
$username=$_SESSION["username"];
}
$pageName=basename($_SERVER['PHP_SELF']);//Pagina en la que se encuentra el usuario actualmente
function logConfirm($pageName){//Proceso que confirma si un usuario ha iniciado sesión
    if(!isset($_SESSION["username"])){
      if($pageName!="index.php"){//Si el usuario no ha iniciado sesión, y trata navegar a otra pagina, sera enviado al index
      ?>
      <script>window.location.replace("index.php");</script>
      <?php
      }
    }
    else{
      if($pageName=="index.php"){//si el usuario ha iniciado sesion y trata de volver a iniciar, sera redirigido a la pagina contenido.php
      ?>
      <script>window.location.replace("contenido.php");</script>
      <?php
      }
    }   
}
function pokefromApi($pokeNumber,$mysqli){//consigue los datos de un Pokemon especifico desde la PokeApi
  $bdquery="SELECT pokename as name, photo as photo, summary as summary, abilityA as abilityA,abilityB as abilityB from pokedex where idnumber=$pokeNumber";
  $lookfromBD=mysqli_query($mysqli,$bdquery);
  if($pokeInfo=mysqli_fetch_array($lookfromBD)){
  
  }
  else{
  $call= curl_init("https://pokeapi.co/api/v2/pokemon/".$pokeNumber);//se comunica con la Api para obtener informacion del Pokemon
  curl_setopt($call, CURLOPT_RETURNTRANSFER,TRUE);
  $getData= curl_exec($call);
  curl_close($call);
  $pokeData=json_decode($getData);//los datos se obtienen y se guardan en la variable
  $call= curl_init("https://pokeapi.co/api/v2/pokemon-species/".$pokeNumber);
  curl_setopt($call, CURLOPT_RETURNTRANSFER,TRUE);
  $getFlavor= curl_exec($call);
  curl_close($call);
  $pokeFlavor=json_decode($getFlavor);
  $maxentries=sizeof($pokeFlavor->flavor_text_entries);//toma todas las descripciones del pokemon en multiples idiomas
  $maxchar=0;//el maximo de caracteres de una descripccion
  for($y=0;$y<$maxentries;$y++){
  $lang=$pokeFlavor->flavor_text_entries[$y]->language->name;
    if($lang=="es"){//filtra todas las descripciones en idioma español
    $currentchar=strlen($pokeFlavor->flavor_text_entries[$y]->flavor_text);
      if($currentchar>$maxchar){//si la descripcion obtenida tiene mas caracteres sera elegida como la descripción para mostrar en la tabla
        $maxchar=$currentchar;
        $flavortext=$pokeFlavor->flavor_text_entries[$y]->flavor_text;
      }
    }

  }
  $abilityB="";
  if(isset($pokeData->abilities[1]->ability->name)){
    $abilityB=$pokeData->abilities[1]->ability->name;
  }
  $pokeInfo= [
    "name"=>ucfirst($pokeData->species->name),
    "photo"=>$pokeData->sprites->front_default,
    "summary"=>$flavortext,
    "abilityA"=>$pokeData->abilities[0]->ability->name,
    "abilityB"=>$abilityB
  ];//los datos obtenidos del pokemon se ordenan en un array y se plasman en un form
  }
  ?>
  <form id="catch_<?php echo($pokeNumber); ?>" action="catchpokemon.php" method="post">
    <input type="hidden" name="number" value="<?php echo($pokeNumber) ?>">
    <input type="hidden" name="name" value="<?php echo($pokeInfo ["name"]) ?>">
    <input type="hidden" name="photo" value="<?php echo($pokeInfo ["photo"]) ?>">
    <input type="hidden" name="summary" value="<?php echo($pokeInfo ["summary"]) ?>">
    <input type="hidden" name="abilityA" value="<?php echo($pokeInfo ["abilityA"]) ?>">
    <input type="hidden" name="abilityB" value="<?php echo($pokeInfo ["abilityB"]) ?>">
    
    
  </form>
  <?php
  echo "
  <th scope='row'>".$pokeNumber."</th>
  <td>".$pokeInfo ["name"]."</td>
  <td>
    <img src='".$pokeInfo["photo"]."' class='img-thumbnail' alt='".$pokeInfo ["name"]."'>
  </td>
  <td>".$pokeInfo ["summary"]."</td>
  <td>".$pokeInfo ["abilityA"].", ".$pokeInfo ["abilityB"]."</td>";
  $statusquery=mysqli_query($mysqli,"SELECT * FROM pokedex where idnumber='$pokeNumber'");
  $exist=mysqli_num_rows($statusquery);
  if($exist==0){
    $statustext="No registrado";
  }
  else{
    $statustext="Ya registrado";
    $catchaction="<a href='elegir-que-modificar.php?id=".$pokeNumber."' class='btn btn-info'>Modificar Datos</a>";
  }
  ?>
  <td><?php echo($statustext); ?></td>
  <td><?php if(isset($catchaction)){ echo($catchaction);} else{ ?><button type='button' onclick='document.getElementById("catch_<?php echo($pokeNumber) ?>").submit();' class='btn btn-info'>Capturar Datos</button><?php }?></td>
  <?php
}
function pokefromBD($mysqli,$sortsql){
$getpokedex=mysqli_query($mysqli,$sortsql);
while($pokearray=mysqli_fetch_array($getpokedex)){
?>
    <tr>
        <th scope="row"><?php echo($pokearray['idnumber']) ?></th>
      <td><?php echo($pokearray['pokename']) ?></td>
      <td>
        <img src="<?php echo($pokearray['photo']) ?>" class="img-thumbnail" alt="<?php echo($pokearray['idnumber']) ?>">
      </td>
      <td><?php echo($pokearray['summary']) ?></td>
      <td><?php echo($pokearray['abilityA']) ?>, <?php echo($pokearray['abilityB']) ?></td>
      <td><a href="elegir-que-modificar.php?id=<?php echo($pokearray['idnumber']);  ?>" class="btn btn-info">Modificar Información</a></td>
      <td><a href="elegir-que-eliminar.php?id=<?php echo($pokearray['idnumber']);  ?>" class="btn btn-danger">Eliminar Información</a></td>
    </tr>   
    <?php 
  }
}

function bringChangelog($autor,$dextarget,$comment,$mysqli,$undoquery){
  $howmany=0;
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $id = substr(str_shuffle($permitted_chars), 0, 20);
  $changequery=mysqli_query($mysqli,"INSERT into changelog(id,dextarget,autor,comentario) values ('$id','$dextarget','$autor','$comment')");
  $upquery=mysqli_query($mysqli,"UPDATE changelog set undoquery='$undoquery' where id='$id'");
  

}

function showChangelog($mysqli,$username){
  $summonLog=mysqli_query($mysqli,"SELECT * from changelog order by fecha desc limit 10");
  while($changelog=mysqli_fetch_array($summonLog)){
  ?>
  <tr>
  <th scope="row"><?php echo($changelog['id']) ?></th>
  <td><?php echo($changelog['fecha']); ?></td>
  <td><?php echo($changelog['autor']); ?></td>
  <td><?php echo($changelog['comentario']); ?></td>
  <td><?php if($username==$changelog['autor']){ ?><a href="use_undo.php?logid=<?php echo($changelog['id']) ?>" class="btn btn-success">Deshacer Cambio</a><?php } else{echo("N/A");} ?></td>
  </tr>
  <?php 
  }
}
  ?>
