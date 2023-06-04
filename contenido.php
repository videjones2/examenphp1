<?php 
include 'conex.php';
include 'elementor.php';
logConfirm($pageName);
$limit=1;
if(isset($_GET["limit"])){
$limit=$_GET["limit"];
}
if(isset($_GET["searcher"])){
  $limit=1;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <?php 
    Headstyle("Buscar Informacion");
    ?>
  </head>
  <body>
  <?php
  topHeader("Buscar Informacion"); 
  Navbar($pageName);
  ?>
    <div id="contenido" class="py-5">
      <div class="container-xl">
        <h1 class="text-center pb-5">
          Listado de Pokémon
        </h1>
        <p class="text-center pb-5">Lista de Pokemon aleatoria extraida de la <a target="_blank" href="https://pokeapi.co/">PokeApi</a></p>
        <p class="text-center pb-5">Mostrando <?php echo($limit); ?> Pokemon</a></p>
        <form method="GET">
          <p>
          Quieres Buscar a un Pokemon? Ingresa su numero registrado en la Pokedex, tal vez ya este dentro de nuestra base de datos
          </p>
          <input class="form-select" min="1" max="800" placeholder="Ingresa un numero del 1 al 800" type="number" name="searcher" value="<?php echo($_GET["searcher"]) ?>">
          <button type="submit" class="btn btn-info">Buscar Pokemon</button>
        </form>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Foto</th>
              <th scope="col">Descripción</th>
              <th scope="col">Habilidades</th>
              <th scope="col">Estado</th>
              <th scope="col">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(!isset($_GET["searcher"])){
            for($x=1;$x<=$limit;$x++){
            $randomnumber=rand(1,800);
            ?>
            <tr>
              <?php pokefromApi($randomnumber,$mysqli); ?>
            </tr>          
            <?php 
            }
            }
            else{
            ?>
            <tr>
              <?php pokefromApi($_GET["searcher"],$mysqli); ?>
            </tr> 
            <?php
            }
            ?>
          </tbody>
        </table>
        <?php 
        Sorter($pageName,$limit);
        ?>
      </div>
  </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>