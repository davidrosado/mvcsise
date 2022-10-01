<?php
class pisoHabitacion{
    private $pisoHabitacion;
    public function __construct(){
        $this->pisoHabitacion = array();
        require_once('../../class/mysql_crud.php');
    }

     public function insertarv2($tabla, $data) {
        $db = new Database();
        $db->connect();
        $db->insert($tabla,$data);  // Table name, column names and respective values
        $res = $db->getResult();  
        print_r($res);        
     }


    // FUNCION MOSTRAR
    public function mostrarv2($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q= "SELECT piso.IdPiso, piso.Descripcion, estado.Descripcion as Estado, piso.FechaCreacion 
        FROM $tabla  INNER JOIN estado ON estado.IdEstado = piso.IdEstado
        where ".$condicion." ORDER BY piso.Descripcion ASC";

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
}