<?php
require_once("config.php");
require_once("vista/index.php");
require_once("controlador/login.php");
require_once("vista/layouts/cabecera.php");

if(isset($_GET['m'])):    
    if(method_exists("loginController",$_GET['m'])):
        loginController::{$_GET['m']}();
    endif;
else:
    loginController::index();
endif;
?>

<?php require_once("vista/layouts/footer.php");?>