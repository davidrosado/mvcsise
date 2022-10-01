<?php
$vista = 'TIPO DE DOCUMENTO';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/tipo_documento.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");

if(isset($_GET['m'])):
    if(method_exists("tipoDocumentoController",$_GET['m'])):
        tipoDocumentoController::{$_GET['m']}();
    endif;
else:
    tipoDocumentoController::index();
endif;?>

<?php require_once("../layouts/footer.php");
?>