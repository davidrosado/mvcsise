<?php
$vista = 'CONDICIÓN HABITACION';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/estado_habitacion.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");

if(isset($_GET['m'])):
    if(method_exists("estadoHabitacionController",$_GET['m'])):
        estadoHabitacionController::{$_GET['m']}();
    endif;
else:
    estadoHabitacionController::index();
endif;
require_once("../layouts/footer.php");
?>