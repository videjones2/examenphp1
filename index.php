<?php 
include 'conex.php';
logConfirm($pageName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
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

    <div class="container text-center py-5" id="bienvenida">
        <div>
            <div class="card-body">
              <h1>
                Bienvenido a la aplicación CRUD
              </h1>
            </div>
          </div>
    </div>

    <div class="container-xl text-center py-5" id="login">
        <div class="row align-items-start">
          <div class="col-10 offset-1 text-center">
            <form action="login.php" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
                  <input name="username" type="text" class="form-control" id="usuario" aria-describedby="userlHelp">
                  <div id="userHelp" class="form-text">Favor de ingresar el nombre de usuario autorizado para acceder.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                  <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
          </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>