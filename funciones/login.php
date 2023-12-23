<?php 
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT U.id, U.nombre, U.apellido, U.imagen, A.nombre as area, U.activo, U.id_nivel
     FROM usuarios U, areas A
     WHERE email='$vUsuario' AND clave= MD5('$vClave') AND U.id_area=A.id ";

     

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Usuario['ID'] = $data['id'];
        $Usuario['NOMBRE'] = $data['nombre'];
        $Usuario['APELLIDO'] = $data['apellido'];
        $Usuario['IMAGEN'] = $data['imagen'];
        $Usuario['AREA'] = $data['area'];
        $Usuario['ACTIVO'] = $data['activo'];
        $Usuario['NIVEL'] = $data['id_nivel'];
        
        
    }
    return $Usuario;
}


function insertarFecha($vConexion, $idUsuario){
    $SQL="UPDATE usuarios SET fechaAcceso = NOW() WHERE id = $idUsuario";
    
    if (!mysqli_query($vConexion, $SQL)) {
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    
    return true;
}


?>