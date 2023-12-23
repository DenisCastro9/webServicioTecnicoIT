<?php
function Validar_Datos() {
    $vMensaje='';
    
    if (strlen($_POST['Titulo']) < 10) {
        $vMensaje.='Ingrese un titulo de al menos 10 caracteres. <br />';
    }
    if (strlen($_POST['Descripcion']) < 10) {
        $vMensaje.='Ingrese una descripcion del problema. <br />';
    }
    if (empty($_POST['Prioridad']) ) {
        $vMensaje.='Debes seleccionar prioridad. <br />';
    }

    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }


    return $vMensaje;

}

?>