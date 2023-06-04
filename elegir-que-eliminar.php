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
    Headstyle("Eliminar Información");
    ?>
  </head>
  <body>
  <?php 
  topHeader("Eliminar Información");
  Navbar($pageName)
  ?>
    <div id="contenido" class="py-5">
      <div class="container-xl">
        <form method="POST" action="updatepokemon.php">
        <input type="hidden" name="pokenumber" value="<?php echo($pokenumber); ?>">
        <input type="hidden" name="nullbox" value="1">
        <h1 class="text-center pb-5">
          Eliminar Información
        </h1>
        <p>
            Seleccione el atributo vaciar del Pokemon <?php echo($pokenumber); ?>:
        </p>
        <select name="tabletarget" class="form-select" aria-label="Default select example">
            <option value="pokename">Nombre</option>
            <option value="photo">Foto</option>
            <option value="summary">Descripción</option>
            <option value="abiltyA">Habilidad A</option>
            <option value="abilityB">Habilidad B</option>
          </select>
          <a href="informacion-local.php" class="btn btn-secondary">Regresar</a>
          <button type="submit" class="btn btn-info">Continuar</button>
        </form>
        <p>
            Prefieres en su lugar eliminar el registro?
            <br>
            Haz clic aqui 
        </p>
        <form id="releasepokemon" method="POST" action="releasepokemon.php">
          <input type="hidden" name="pokenumber" value="<?php echo($pokenumber); ?>">
        </form>
        <button onclick="uSure()" class="btn btn-danger">Eliminar Registro</button>

      </div>
  </div>

  </div>

    <script>
      function uSure() {
        let text = "El registro del Pokemon se eliminara de la base de datos local. Quieres continuar?";
        if (confirm(text) == true) {
        document.getElementById("releasepokemon").submit()
        } 
        else {

        }
        
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>