<?php 
include 'conex.php';
logConfirm($pageName);
$limit=1;
if(isset($_GET["limit"])){
$limit=$_GET["limit"];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a la aplicación CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div id="header" class="bg-primary">
      <div class="container-xl">
          <nav class="navbar bg-primary" data-bs-theme="dark">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <img src="https://lofrev.net/wp-content/photos/2017/05/php_emblem.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                  Examen PHP 01
                </a>
              </div>
            </nav>
      </div>
  </div>
  <div id="navegacion" class="py-3">
    <div class="container-xl">
      <nav class="nav justify-content-end">
        <ul class="nav justify-content-end nav-pills">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Información Remota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Información Local</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Historial De Cambios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Cerrar Sesion</a>
          </li>
        </ul>
      </nav>
    </div>
    <div id="contenido" class="py-5">
      <div class="container-xl">
        <h1 class="text-center pb-5">
          Listado de Pokémon
        </h1>
        <p class="text-center pb-5">Lista de Pokemon aleatoria extraida de la <a target="_blank" href="https://pokeapi.co/">PokeApi</a></p>
        <p class="text-center pb-5">Mostrando <?php echo($limit); ?> Pokemon</a></p>
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
            for($x=1;$x<=$limit;$x++){
            $randomnumber=rand(1,800);
            ?>
            <tr>
              <?php pokefromApi($randomnumber,$mysqli); ?>
            </tr>          
            <?php 
            }
            ?>
          </tbody>
        </table>
      </div>
  </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>