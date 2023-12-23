<?php 
function InsertarDatos($vConexion){
    
    $SQL_Insert="INSERT INTO incidencias (titulo, descripcion, id_usuario, fechaActual, id_prioridad, id_estado)
    VALUES ('".$_POST['Titulo']."' ,'".$_POST['Descripcion']."' ,  '".$_SESSION['Usuario_id']."', NOW() ,".$_POST['Prioridad'].", 1)";




    if (!mysqli_query($vConexion, $SQL_Insert)) {
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>