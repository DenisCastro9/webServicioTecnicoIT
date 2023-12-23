<?php
function Listar_Incidencias($vConexion) {

    $Listado=array();

    $SQL = "SELECT I.id, I.titulo, I.descripcion, P.nombre AS Prioridad, I.fechaActual, E.nombre AS Estado,
     U.nombre AS UsuarioN, U.apellido AS UsuarioA, A.nombre AS Area
    FROM incidencias I, prioridades P, estados E, usuarios U, areas A
    WHERE I.id_prioridad = P.id
    AND I.id_estado = E.id
    AND I.id_usuario = U.id
    AND U.id_area = A.id
    ORDER BY I.fechaActual";

     $rs = mysqli_query($vConexion, $SQL);
        
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['id'];
            $Listado[$i]['TITULO'] = $data['titulo'];
            $Listado[$i]['DESCRIPCION'] = $data['descripcion'];
            $Listado[$i]['PRIORIDAD'] = $data['Prioridad'];
            $Listado[$i]['FECHA'] = $data['fechaActual'];
            $Listado[$i]['ESTADO'] = $data['Estado'];
            $Listado[$i]['NOMBRE_USUARIO'] = $data['UsuarioN'];
            $Listado[$i]['APELLIDO_USUARIO'] = $data['UsuarioA'];
            $Listado[$i]['AREA'] = $data['Area'];

            $i++;
    }

    return $Listado;

}
?>