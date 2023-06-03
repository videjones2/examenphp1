<?php
$call= curl_init("https://pokeapi.co/api/v2/pokemon-species/3");
curl_setopt($call, CURLOPT_RETURNTRANSFER,TRUE);
$getFlavor= curl_exec($call);
curl_close($call);
$pokeFlavor=json_decode($getFlavor);
$maxentries=sizeof($pokeFlavor->flavor_text_entries);
$maxchar=0;
for($y=0;$y<$maxentries;$y++){
$lang=$pokeFlavor->flavor_text_entries[$y]->language->name;
	if($lang=="es"){
  $currentchar=strlen($pokeFlavor->flavor_text_entries[$y]->flavor_text);
		if($currentchar>$maxchar){
			$maxchar=$currentchar;
			$flavortext=$pokeFlavor->flavor_text_entries[$y]->flavor_text;
		}
	}

}

echo($flavortext);
?>