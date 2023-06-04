<?php 
include 'conex.php';
include 'elementor.php';
logConfirm($pageName);
$limit=15;
if(isset($_GET["limit"])){
  $limit=$_GET["limit"];
}
$sortsql="SELECT * FROM pokedex order by captureTS DESC LIMIT $limit";
$sorttext="Ordenados por Fecha de captura Descendente";
if(isset($_GET["sort"])){
  switch ($_GET["sort"]) {
    case 'number_asc':
        $sortsql="SELECT * FROM pokedex order by idnumber ASC LIMIT $limit";
        $sorttext="Ordenados por Numero de Pokemon Descendente";
        break;
    case 'number_desc':
        $sortsql="SELECT * FROM pokedex order by idnumber DESC LIMIT $limit";
        $sorttext="Ordenados por Numero de Pokemon Descendente";
        break;
    case 'date_desc':
        $sortsql="SELECT * FROM pokedex order by captureTS DESC LIMIT $limit";
        $sorttext="Ordenados por Fecha de captura Descendente";
        break;
    case 'date_asc':
        $sortsql="SELECT * FROM pokedex order by captureTS asc LIMIT $limit";
        $sorttext="Ordenados por Fecha de captura Ascendente";
        break;
  } 
}
?>
<!doctype html>
<html lang="en">
  <?php
  Headstyle("Información Local");
  ?>
  <body>
  <?php
  topHeader("Información Local");
  Navbar($pageName);
  ?>
    <div id="contenido" class="py-5">
      <div class="container-xl">
        <h1 class="text-center pb-5">
          Información Local
        </h1>
        <p class="text-center pb-5">
            En esta sección podrá ver los cambios guardados localmente de la información obtenida en PokeAPI: 
            <br>
            <?php echo($sorttext); ?>
        </p>      
            
        <?php 
        Sorter($pageName,$limit);
        ?>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Foto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Habilidades</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              pokefromBD($mysqli,$sortsql);
              ?>       
            </tbody>
          </table>
      </div>
  </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>