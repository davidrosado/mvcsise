<?php
ob_start();
//require_once("modelo/login.php");
class loginController{
    private $model;
    public function __construct(){
        $this->model = new login();
    }

    // mostrar
    static function index(){
        require_once("vista/login/index.php");
    }

    // mostrar
    static function ingresar(){
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];
        if($pass='123'){
            //echo '<script>alert("login exitoso")</script>';
            header("Location:".urlhabitacion);
            ob_end_flush();
        }      
    }
}?>