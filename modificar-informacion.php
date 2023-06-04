<?php 
include 'conex.php';
logConfirm($pageName);
if(!isset($_POST["pokenumber"])){
?>
<script>window.location.replace("informacion-local.php");</script>
<?php
}
$pokenumber=$_POST["pokenumber"];
$tabletarget=$_POST["tabletarget"];
$getquery=mysqli_query($mysqli,"SELECT $tabletarget from pokedex where idnumber=$pokenumber");
$data=mysqli_fetch_array($getquery);
include 'elementor.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <?php 
    Headstyle("Modificando Información");
    ?>
  </head>
  <body>
  <?php 
  topHeader("Modificando Información");
  Navbar($pageName)
  ?>
    <div id="contenido" class="py-5">
      <form method="POST" action="updatepokemon.php">
      <div class="container-xl">
        
        <input type="hidden" name="pokenumber" value="<?php echo($pokenumber); ?>">
        <input type="hidden" name="tabletarget" value="<?php echo($tabletarget); ?>">
        <h1 class="text-center pb-5">
          Modificando información
        </h1>
        <p>
            Edite la información de <?php echo($tabletarget); ?>:
        </p>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Modifique el campo aqui</label>
            <textarea name="modbox" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo($data[$tabletarget]) ?></textarea>
          </div>
          <div class="mb-3">
            <a href="elegir-que-modificar.php?id=<?php echo($pokenumber); ?>" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-info">Guardar Cambio</button>
        </div>
      </div>
      </form>
    </div>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>