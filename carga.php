<?php 
session_start();


if (empty($_SESSION['Usuario_Nombre']) ) {
  header('Location: cerrarsesion.php');
  exit;
}

require_once 'funciones/conexion.php';
$MiConexion=ConexionBD(); 

require_once 'funciones/select_prioridades.php';
$ListadoPriori = Listar_Priori($MiConexion);
$CantidadPriori= count($ListadoPriori);



require_once 'funciones/validacion_datos.php'; 
require_once 'funciones/insertar_datos.php';

$Mensaje='';
$Estilo='danger';
if (!empty($_POST['BotonRegistrar'])) {

    $Mensaje=Validar_Datos();
    if (empty($Mensaje)) {
        if (InsertarDatos($MiConexion) != false) {
            $Mensaje = 'Registro almacenado!';
            $_POST = array(); 
            $Estilo = 'success'; 
        }
    }
}



require_once 'seccionadoIndex/header.inc.php';
?>
    </header>
    <?php require_once 'seccionadoIndex/menu.inc.php';?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registra aqui tu incidencia</h1>
          <p>Detalla lo mas que puedas el problema que se presenta</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa los datos solicitados</h3>

<?php $EstiloInfo="info";?>

                                  

                                    
            <?php if (empty($Mensaje)) { ?>                          
              <div class ="bs-component">  
                <div class="alert alert-dismissible alert-<?php echo $EstiloInfo; ?>">
                <?php echo 'Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios';?>
                </div>
              </div>                        
            <?php } elseif(!empty($Mensaje)){?>  
              <div class ="bs-component">  
                <div class="alert alert-dismissible alert-<?php echo $Estilo; ?>">
                <?php echo $Mensaje;?>
                </div>
              </div>

              <?php }?>

            <div class="tile-body">
            <form role="form" method='post'>


                <div class="form-group">
                  <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" type="text" name="Titulo" id="titulo" 
                  value="<?php echo !empty($_POST['Titulo']) ? $_POST['Titulo'] : ''; ?>">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Descripción del problema </label><i class="fa fa-asterisk" aria-hidden="true"></i>
                  <textarea class="form-control" rows="4"  name="Descripcion" id="descripcion" 
                  value="<?php echo !empty($_POST['Descripcion']) ? $_POST['Descripcion'] : ''; ?>"></textarea>
                </div>


                <div class="form-group">
                  <label class="control-label">Prioridad</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <div class="form-check">
                    <label class="form-check-label">
                   <?php $selected='';
                    for ($i=0 ; $i < $CantidadPriori ; $i++) {
                     if (!empty($_POST['Prioridad']) && $_POST['Prioridad'] ==  $ListadoPriori[$i]['ID']) {
                     $selected = 'checked';
                      }else {
                      $selected=''; }?>
                      <input class="form-check-input" type="radio" name="Prioridad" id="prioridad"
                       value="<?php echo $ListadoPriori[$i]['ID']; ?>" <?php echo $selected; ?>>
                        <?php echo $ListadoPriori[$i]['NOMBRE']; ?>
                      <br/>
                      <?php } ?>
                      </label>
                </div>
                </div>

                <div class="tile-footer">
              <button class="btn btn-primary" type="submit" value="Registrar" name="BotonRegistrar" >
              <i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            </div>
            
            </form>



          </div>
        </div>
        
      </div>
    </main>
    <?php 
require_once 'seccionadoLogin/footer.inc.php';
?>