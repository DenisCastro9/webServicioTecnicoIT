<?php
function Listar_Priori($vConexion) {

    $Listado=array();

    $SQL = "SELECT * FROM prioridades ORDER BY id";

     $rs = mysqli_query($vConexion, $SQL);
        
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['id'];
            $Listado[$i]['NOMBRE'] = $data['nombre'];
            $i++;
    }


    return $Listado;

}
?>