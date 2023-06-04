<?php 
include 'conex.php';
logConfirm($pageName);
if(!isset($_GET["id"])){
  $backref="informacion-local.php";
  $title="Aviso, debes definir un Pokemon";
  $error="Vuelve a Informacion Local y elige un Pokemon de la lista ";
  include 'notice.php';
  exit();
}
include 'elementor.php';
$pokenumber=$_GET["id"];
?>
<!doctype html>
<html lang="en">
  <head>
    <?php 
    Headstyle("Modificar Información");
    ?>
  </head>
  <body>
  <?php 
  topHeader("Modificar Información");
  Navbar($pageName)
  ?>
    <div id="contenido" class="py-5">
      <div class="container-xl">
        <form method="POST" action="modificar-informacion.php">
        <input type="hidden" name="pokenumber" value="<?php echo($pokenumber); ?>">
        <h1 class="text-center pb-5">
          Modificar Informacion
        </h1>
        <p>
            Seleccione el atributo a modificar del Pokemon <?php echo($pokenumber); ?>:
        </p>
        <select name="tabletarget" class="form-select" aria-label="Default select example">
            <option value="pokename">Nombre</option>
            <option value="photo">Foto</option>
            <option value="summary">Descripción</option>
            <option value="abiltyA">Habilidad A</option>
            <option value="abilityB">Habilidad B</option>
          </select>
          <button type="submit" class="btn btn-secondary">Continuar</button>
        </form>
      </div>
  </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>