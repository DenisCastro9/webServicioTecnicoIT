<?php
session_start();


if (empty($_SESSION['Usuario_Nombre']) ) {
  header('Location: cerrarsesion.php');
  exit;
}

                

require_once 'funciones/conexion.php';



$MiConexion = ConexionBD();


require_once 'funciones/select_incidencias.php';



$Listado = Listar_Incidencias($MiConexion);
$CantidadIncidencias = count($Listado);

$cantidad=0;

require_once 'seccionadoIndex/header.inc.php';

?>


    </header>

    <?php require_once 'seccionadoIndex/menu.inc.php';?>





    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>

          <?php if($_SESSION['Usuario_Nivel'] == 1){?>
          <p>Listado total de incidencias </p>
          <?php }?>

          <?php if($_SESSION['Usuario_Nivel'] == 2){?>
          <p>Listado de mis incidencias cargadas</p>
          <?php }?>

          <?php if($_SESSION['Usuario_Nivel'] == 6){?>
          <p>Listado de incidencias no finalizadas</p> 
          <?php }?>


        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active"><a href="#">Listado de Incidencias</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Prioridad</th>
                    <th>Registro</th>
                    <th>Estado</th>
                    <th>Solicitante</th>
                    <th>Area</th>
                    <th>Opciones</th>

                  </tr>
                </thead>


                <tbody>
                
                <?php for($i=0; $i<$CantidadIncidencias; $i++){?>

                  

                  <?php 
                $Color='';
                if($Listado[$i]['ESTADO'] == 'Finalizado'){
                  $Color="table-success";
                }elseif($Listado[$i]['PRIORIDAD'] == 'Media'){
                  $Color="table-warning";  
                }elseif($Listado[$i]['PRIORIDAD'] == 'Baja'){
                  $Color="table-info";
                }elseif($Listado[$i]['PRIORIDAD'] == 'Alta'){
                  $Color='table-danger';
                }?>

                
                


                <?php
                
                if($_SESSION['Usuario_Nivel']== "1") {?>
                <tr class="<?php echo $Color?>">
                  <td><?php echo $Listado[$i]['ID'];?></td>
                  <td><?php echo $Listado[$i]['TITULO'];?></td>
                  <td><?php echo $Listado[$i]['DESCRIPCION'];?></td>
                  <td><?php echo $Listado[$i]['PRIORIDAD'];?></td>
                  <td><?php echo $Listado[$i]['FECHA'];?></td>
                  <td><?php echo $Listado[$i]['ESTADO'];?></td>
                  <td><?php echo $Listado[$i]['NOMBRE_USUARIO'].' '.$Listado[$i]['APELLIDO_USUARIO'] ;?></td>
                  <td><?php echo $Listado[$i]['AREA'];?></td>
                  <td><a href="#">Ver detalles...</a></td>  
                  <?php $cantidad++;?>         
                </tr>
                

                <?php }elseif($Listado[$i]['NOMBRE_USUARIO'] == $_SESSION['Usuario_Nombre'] && $_SESSION['Usuario_Nivel']== "2") {?>
                <tr class="<?php echo $Color?>">
                  <td><?php echo $Listado[$i]['ID'];?></td>
                  <td><?php echo $Listado[$i]['TITULO'];?></td>
                  <td><?php echo $Listado[$i]['DESCRIPCION'];?></td>
                  <td><?php echo $Listado[$i]['PRIORIDAD'];?></td>
                  <td><?php echo $Listado[$i]['FECHA'];?></td>
                  <td><?php echo $Listado[$i]['ESTADO'];?></td>
                  <td><?php echo $Listado[$i]['NOMBRE_USUARIO'].' '.$Listado[$i]['APELLIDO_USUARIO'] ;?></td>
                  <td><?php echo $Listado[$i]['AREA'];?></td>
                  <td><a href="#">Ver detalles...</a></td>     
                  <?php $cantidad++;?>       
                </tr>
                

                <?php }elseif($_SESSION['Usuario_Nivel']== "6" && $Listado[$i]['ESTADO']!= "Finalizado"){?>
                  <tr class="<?php echo $Color?>">
                  <td><?php echo $Listado[$i]['ID'];?></td>
                  <td><?php echo $Listado[$i]['TITULO'];?></td>
                  <td><?php echo $Listado[$i]['DESCRIPCION'];?></td>
                  <td><?php echo $Listado[$i]['PRIORIDAD'];?></td>
                  <td><?php echo $Listado[$i]['FECHA'];?></td>
                  <td><?php echo $Listado[$i]['ESTADO'];?></td>
                  <td><?php echo $Listado[$i]['NOMBRE_USUARIO'].' '.$Listado[$i]['APELLIDO_USUARIO'] ;?></td>
                  <td><?php echo $Listado[$i]['AREA'];?></td>
                  <td><a href="#">Ver detalles...</a></td>   
                  <?php $cantidad++;?>       
                </tr>
                
                <?php }?>




                <?php }?>

                </tbody>
                <h3 class="tile-title">Incidencias: <?php echo $cantidad;?></h3>





              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </main>
    <?php require_once 'seccionadoIndex/footer.inc.php'; ?>




