<?php
$vista = 'ESTADO RECEPCION';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/estado_recepcion.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");

if(isset($_GET['m'])):
    if(method_exists("estadoRecepcionController",$_GET['m'])):
        estadoRecepcionController::{$_GET['m']}();
    endif;
else:
    estadoRecepcionController::index();
endif;
require_once("../layouts/footer.php");
?>