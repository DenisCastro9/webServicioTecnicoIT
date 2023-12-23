<?php 
session_start();
require_once 'seccionadoIndex/header.inc.php';

if (empty($_SESSION['Usuario_Nombre']) ) {
  header('Location: cerrarsesion.php');
  exit;
}




?>
    </header>




<?php require_once 'seccionadoIndex/menu.inc.php';?>




    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
          <p>Este es nuestro panel de administración. Por favor selecciona alguna opción del menú lateral izquierdo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        </ul>
      </div>

<?php if($_SESSION['Usuario_Nivel']== 1){?>
      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Usuarios</h4>
              <p><b>50</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Incidencias Finalizadas</h4>
              <p><b>205</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Incidencias en proceso</h4>
              <p><b>100</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Incidencias Iniciadas</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
     
    </main>
    <?php require_once 'seccionadoIndex/footer.inc.php'; ?>