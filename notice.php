<?php
include 'elementor.php';
if(isset($title)&&isset($error)){
if(!isset($backref)){
$backref=$_SERVER['HTTP_REFERER'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    Headstyle("$title");
    ?>
  </head>
  <body>
  <?php 
  topHeader("Notificación");
  Navbar($pageName)
  ?>
    <div class="container text-center py-5" id="bienvenida">
        <div>
            <div class="card-body">
              <h1>
                <?php echo($title); ?>
              </h1>
              <h2>
                <?php echo($error); ?>
              </h2>
              <?php if(isset($backref)){ ?>
              <a href="<?php echo($backref); ?>" class="btn btn-info">Volver</a>
              <?php 
              } 
              if(isset($goref)){
              ?>
              <a href="<?php echo($goref); ?>" class="btn btn-info">Continuar</a>
              <?php 
              }
              ?>
            </div>
          </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
}
?>