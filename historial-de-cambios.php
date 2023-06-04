<?php
include 'conex.php';
include 'elementor.php';
logConfirm($pageName);
?>
<!doctype html>
<html lang="en">
  <head>
    <?php 
    Headstyle("Historial de cambios");
    ?>
  </head>
  <body>
  <?php 
  topHeader("Historial de cambios");
  Navbar($pageName);
  ?>
    <div id="contenido" class="py-5">
      <div class="container-xl">
        <h1 class="text-center pb-5">
          Historial De Cambios
        </h1>
        <p>
            En esta sección podrá ver los cambios realizados localmente, esto es modificación y eliminación de información:
        </p>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Autor</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              showChangelog($mysqli,$username);
              ?>          
            </tbody>
          </table>
      </div>
  </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>