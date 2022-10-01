<?php
$vista = 'TIPO PERSONAS';
$titulo = '';
require_once("../../config.php");
require_once("../../controlador/tipo_persona.php");
include("../layouts/cabecera.php");
include("../layouts/menu.php");


if(isset($_GET['m'])):
    if(method_exists("tipoPersonaController",$_GET['m'])):
        tipoPersonaController::{$_GET['m']}();
    endif;
else:
    tipoPersonaController::index();
endif;
?>

<script>      
    var estadoRegistro = document.getElementById('valorEstado').value       
    var selectEstado = document.getElementById('selectEstado')

    // SETEAR OPTION EN COMBOS
    for (var i = 0; i < selectEstado.options.length; i++) {
        if (selectEstado.options[i].text === estadoRegistro) {
            selectEstado.selectedIndex = i;
            break;
        }
    }
</script>

<?php require_once("../layouts/footer.php");?>