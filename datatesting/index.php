<?php 
$pokeNumber=3;
$language=42;
//$pokeNumber=rand(1,800);
$call= curl_init("https://pokeapi.co/api/v2/pokemon/".$pokeNumber);
curl_setopt($call, CURLOPT_RETURNTRANSFER,TRUE);
$getData= curl_exec($call);
curl_close($call);
$pokeData=json_decode($getData);
$call= curl_init("https://pokeapi.co/api/v2/pokemon-species/".$pokeNumber);
curl_setopt($call, CURLOPT_RETURNTRANSFER,TRUE);
$getFlavor= curl_exec($call);
curl_close($call);
$pokeFlavor=json_decode($getFlavor);
$pokeInfo= [
  "name"=>ucfirst($pokeData->species->name),
  "photo"=>$pokeData->sprites->front_default,
  "typeA"=>$pokeData->types[0]->type->name,
  "typeB"=>$pokeData->types[1]->type->name,
  "summary"=>$pokeFlavor->flavor_text_entries[42]->flavor_text,
  "abilityA"=>$pokeData->abilities[0]->ability->name,
  "abilityB"=>$pokeData->abilities[1]->ability->name
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokemon encontrado: <?php echo($pokeInfo["name"]);  ?></title>
</head>
<body>
  <h1>Pokemon encontrado</h1>
    <table style="width:50%">
      <tr>
        <th><?php echo($pokeInfo["name"]);  ?></th>
      </tr>
      <tr>
        <td>
          <img src="<?php echo($pokeInfo["photo"]) ?>" />
        </td>
      </tr>
      <tr>
        <td><?php echo($pokeInfo["typeA"]); ?></td>
        <td><?php echo($pokeInfo["typeB"]); ?></td>
      </tr>
      <tr>
        <td><?php echo($pokeInfo["summary"]); ?></td>
      </tr>
      <tr>
        <td>Habilidad 1: <?php echo($pokeInfo["abilityA"]); ?></td>
        <td>Habilidad 2: <?php echo($pokeInfo["abilityB"]); ?></td>
      </tr>
    </table>
</body>
</html>