<?php
$vista = 'PERSONAS';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/persona.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");

if(isset($_GET['m'])):
    if(method_exists("personaController",$_GET['m'])):
        personaController::{$_GET['m']}();
    endif;
else:
    personaController::index();
endif;
require_once("../layouts/footer.php");
?>