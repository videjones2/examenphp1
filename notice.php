<?php 
include 'conex.php';
//if(isset($title)&&isset($error)){
if(!isset($backref)){
$backref=$_SERVER['HTTP_REFERER'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($title); ?></title>
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
                <?php echo($title); ?>
              </h1>
              <h2>
                <?php echo($error); ?>
              </h2>
              <?php if(isset($backref)){ ?>
              <button type="button" class="btn btn-info">Volver</button>
              <?php 
              } 
              if(isset($goref)){
              ?>
              <button type="button" class="btn btn-info">Continuar</button>
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
//}
?>