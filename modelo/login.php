<?php
class login{
    private $login;
    public function __construct(){
        $this->login = array();
        require_once('class/mysql_crud.php');
    }

    public function login($tabla, $user, $pass){
        $db = new Database();
        $db->connect();
        //$q= "SELECT IdPersona, 	Correo, Clave FROM $tabla WHERE Correo = $user AND Clave = $pass";

        $q= "SELECT IdPersona, 	Correo, Clave FROM persona WHERE Correo=$user AND Clave=$pass AND IdTipoPersona='1'";

        $db->selectQuery($q);
        $res = $db->getResult();
        var_dump($res);
        return $res;
    }        
}