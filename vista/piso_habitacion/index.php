<?php
$vista = 'PISO HABITACION';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/piso_habitacion.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");

if(isset($_GET['m'])):
    if(method_exists("pisoHabitacionController",$_GET['m'])):
        pisoHabitacionController::{$_GET['m']}();
    endif;
else:
    pisoHabitacionController::index();
endif;
require_once("../layouts/footer.php");
?>