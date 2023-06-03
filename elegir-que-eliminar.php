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
            <a class="nav-link active" aria-current="page" href="#">Información Remota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Información Local</a>
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
          Listado de Pokémon
        </h1>
        <p>
            Seleccione el atributo a eliminar:
        </p>
        <select class="form-select" aria-label="Default select example">
            <option selected>Seleccione de este menú</option>
            <option value="1">Número</option>
            <option value="2">Nombre</option>
            <option value="3">Foto</option>
            <option value="4">Descripción</option>
            <option value="5">Habilidades</option>
          </select>
      </div>
  </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>