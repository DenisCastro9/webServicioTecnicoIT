<?php 
session_start();

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();
require_once 'funciones/login.php'; 

$Mensaje='';
if (!empty($_POST['BotonLogin'])) {

  

    
    $UsuarioLogueado = DatosLogin($_POST['email'], $_POST['password'], $MiConexion);
    

    if ( !empty($UsuarioLogueado)) {
       $_SESSION['Usuario_id']         = $UsuarioLogueado['ID'];
       $_SESSION['Usuario_Nombre']     =   $UsuarioLogueado['NOMBRE'];
       $_SESSION['Usuario_Apellido']   =   $UsuarioLogueado['APELLIDO'];
       $_SESSION['Usuario_Imagen']      =   $UsuarioLogueado['IMAGEN'];
       $_SESSION['Usuario_Area']        =   $UsuarioLogueado['AREA'];
       $_SESSION['Usuario_Nivel']        =   $UsuarioLogueado['NIVEL'];

      insertarFecha($MiConexion,  $_SESSION['Usuario_id'] );

       if ($UsuarioLogueado['ACTIVO']==0) {
        $Mensaje ='Ud. no se encuentra activo en el sistema.';
    }else {
        header('Location: index.php');
        exit;
    }

}else {
    $Mensaje='Datos incorrectos, ingresa nuevamente.';
}


}


require_once 'seccionadoLogin/header.inc.php';
?>

  </head>



  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Panel de administración</h1>
      </div>
      <div class="login-box ">





        <form class="login-form" role="form" method='post'>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESA AL PANEL</h3>

          <?php if (!empty($Mensaje)) { ?>
            <div class="alert alert-dismissible alert-danger">
              <?php echo $Mensaje; ?>
            </div>
          <?php } ?>



          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" placeholder="Email" name="email" type="text" autofocus value="<?php echo !empty($_POST['email']) ? $_POST['email'] : ''; ?>" >
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" placeholder="Password" name="password" type="password">
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste la clave ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block" value="Login" name="BotonLogin"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>
        </form>










        <form class="forget-form" method="post" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Tu clave será reseteada</strong>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label">Ingresa tu correo</label>
            <input class="form-control" placeholder="Email">
          </div>
          <div class="form-group btn-container ">
            <button class="btn btn-primary btn-block" type='submit' name='btnResetearClave' value='dadfa'><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
          </div>
        </form>





      </div>
    </section>



  <?php 
require_once 'seccionadoLogin/footer.inc.php';
?>