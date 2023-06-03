<?php
session_start();
$mysqli = mysqli_connect('localhost','videroot','mellamojose','examenphp');//datos de conexion a la base de datos
$mysqli -> set_charset("utf8");
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
    $catchaction="No requiere capturar de nuevo";
  }
  ?>
  <td><?php echo($statustext); ?></td>
  <td><?php if(isset($catchaction)){ echo($catchaction);} else{ ?><button type='button' onclick='document.getElementById("catch_<?php echo($pokeNumber) ?>").submit();' class='btn btn-info'>Capturar Datos</button><?php }?></td>
  <?php
}

?>