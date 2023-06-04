<?php 
function Navbar($pageName){
$nameslist=array("contenido.php", "informacion-local.php", "historial-de-cambios.php");
$displaylist=array("Buscar Información", "Información Local", "Historial De Cambios");
?>
<div id="navegacion" class="py-3">
    <div class="container-xl">
      <nav class="nav justify-content-end">
        <ul class="nav justify-content-end nav-pills">
          <?php 
          for($n=0;$n<sizeof($nameslist);$n++){
          ?>
          <li class="nav-item">
            <a class="nav-link <?php if($pageName==$nameslist[$n]){echo("active"); } ?>" href="<?php echo($nameslist[$n]) ?>"><?php echo($displaylist[$n]) ?></a>
          </li>
          <?php 
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Cerrar Sesion</a>
          </li>
        </ul>
      </nav>
  </div>
<?php
}

function Sorter($pageName,$limit){
?>
<form method="GET">
		<?php 
		if($pageName=="informacion-local.php"){
		?>
    <p>
    Seleccione el orden de datos:
    </p>
    <select name="sort" class="form-select" aria-label="Default select example">
      <option value="number_asc">Por Número, Ascendente</option>
      <option value="number_desc">Por Número, Descendente</option>
      <option value="date_asc">Por Fecha de captura, Ascendente</option>
      <option value="date_desc">Por Fecha de captura, Descendente</option>
    </select>
		<?php 
		}
		?>
    <p>
    Para una vista al azar, seleccione cuantos datos mostrar
    </p>
    <input class="form-select" min="1" type="number" name="limit" value="<?php echo($limit) ?>">
    <button type="submit" class="btn btn-info">Confirmar cambios</button>
</form>
<?php 
}
?>