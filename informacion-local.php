<?php 
include 'conex.php';
logConfirm($pageName);
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
            <a class="nav-link" href="#">Información Remota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  aria-current="page" href="#">Información Local</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Historial De Cambios</a>
          </li>
        </ul>
      </nav>
    </div>
    <div id="contenido" class="py-5">
      <div class="container-xl">
        <h1 class="text-center pb-5">
          Información Local
        </h1>
        <p>
            En esta sección podrá ver los cambios guardados localmente de la información obtenida en PokeAPI:
        </p>
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
              <tr>
                <th scope="row">722</th>
                <td>Rowlet</td>
                <td>
                  <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/722.png" class="img-thumbnail" alt="rowlet">
                </td>
                <td>Es cauteloso, desconfiado y de naturaleza nocturna. Durante el día acumula energía mediante la fotosíntesis.</td>
                <td>overgrow, long-reach</td>
                <td><button type="button" class="btn btn-info">Modificar Información</button></td>
                <td><button type="button" class="btn btn-danger">Eliminar Información</button></td>
              </tr>          
            </tbody>
          </table>
      </div>
  </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>