<?php
$vista = 'CATEGORÍA HABITACION';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/categoria_habitacion.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");

if(isset($_GET['m'])):
    if(method_exists("categoriaHabitacionController",$_GET['m'])):
        categoriaHabitacionController::{$_GET['m']}();
    endif;
else:
    categoriaHabitacionController::index();
endif;
require_once("../layouts/footer.php");
?>