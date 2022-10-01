<?php
$vista = 'HABITACIONES';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/habitacion.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");

if(isset($_GET['m'])):
    if(method_exists("habitacionController",$_GET['m'])):
        habitacionController::{$_GET['m']}();
    endif;
else:
    habitacionController::index();
endif;
require_once("../layouts/footer.php");
?>