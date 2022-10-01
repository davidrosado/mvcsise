<?php
$vista = 'RECEPCION';
$titulo = '';
require_once("../../config.php");
//require_once("../../route.php");
require_once("../../controlador/recepcion.php");
include("../layouts/cabecera.php");
/*
recepcionController::showCondicion();
recepcionController::showPisos();
recepcionController::showCategorias();*/
//include ("../layouts/menu.php");

if(isset($_GET['m'])):    
    if(method_exists("recepcionController",$_GET['m'])):
        recepcionController::{$_GET['m']}();
    endif;
else:
    recepcionController::index();
endif;

require_once("../layouts/footer.php");
?>

