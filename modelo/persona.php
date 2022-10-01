<?php
class persona{
    private $persona;
    //private $db2;
    public function __construct(){
        $this->persona = array();
        //require_once('db.php');
        require_once('../../class/mysql_crud.php');
    }

     public function insertarv2($tabla, $data) {
        $db = new Database();
        $db->connect();
        //$data = $db->escapeString("name5@email.com"); // Escape any input before insert
        $db->insert($tabla,$data);  // Table name, column names and respective values
        $res = $db->getResult();  
        //print_r($res);        
     }


    // FUNCION MOSTRAR
    public function mostrarv2($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q = "SELECT persona.IdPersona, tipo_documento.Descripcion as DescripcionTipoDocumento, persona.Documento, persona.Nombre, persona.Apellido, persona.Correo, persona.Clave, tipo_persona.Descripcion as DescripcionTipoPersona, estado.Descripcion as DescripcionEstado, persona.FechaCreacion 
        FROM $tabla INNER JOIN estado ON persona.IdEstado = estado.IdEstado
        INNER JOIN tipo_documento ON persona.IdTipoDocumento = tipo_documento.IdTipoDocumento
        INNER JOIN tipo_persona ON persona.IdTipoPersona = tipo_persona.IdTipoPersona
        WHERE $condicion ORDER BY persona.Nombre ASC";
        $db->selectQuery($q);
        $res = $db->getResult();
        //var_dump($res);
        return $res;
    }

    public function mostrarTipoDocumento($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q= "SELECT IdTipoDocumento, Descripcion from ".$tabla." where ".$condicion.";";

        $db->selectQuery($q);
        $res = $db->getResult();
        //var_dump($res);
        return $res;
    }    

    public function mostrarEstado($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q= "SELECT IdEstado, Descripcion from ".$tabla." where ".$condicion.";";

        $db->selectQuery($q);
        $res = $db->getResult();
        //var_dump($res);
        return $res;
    }

    public function mostrarRol($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q= "SELECT IdTipoPersona, Descripcion from ".$tabla." where ".$condicion.";";
        $db->selectQuery($q);
        $res = $db->getResult();
        //var_dump($res);
        return $res;
    }

    public function actualizarv2($tabla, $data, $condicion){
        $db = new Database();
        $db->connect();
        $db->update($tabla,$data,$condicion); // Table name, column names and values, WHERE conditions
        //$db->update('CRUDClass',array('name'=>"Name 4",'email'=>"name4@email.com"),'id="1" AND name="Name 1"'); 
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $res = $db->getResult();
        print_r($res);
    }

    public function eliminarv2($tabla, $condicion){
        $db = new Database();
        $db->connect();
        $db->delete($tabla, $condicion);  // Table name, WHERE conditions
        $res = $db->getResult();  
        /*if ($res) {
            return true;
        }else {
            return false;
        }*/
        print_r($res);
    }    
}