<?php
class habitacion{
    private $habitacion;
    //private $db2;
    public function __construct(){
        $this->habitacion= array();
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
        $q = "SELECT habitacion.IdHabitacion, habitacion.Numero, habitacion.Detalle, habitacion.Precio, estado_habitacion.Descripcion as DescripcionEstado, 
        piso.Descripcion as DescripcionPiso, categoria.Descripcion as DescripcionCategoria, 
        estado.Descripcion as IdEstado, habitacion.FechaCreacion 
        FROM habitacion INNER JOIN estado_habitacion ON habitacion.IdEstadoHabitacion = estado_habitacion.IdEstadoHabitacion 
        INNER JOIN piso ON habitacion.IdPiso = piso.IdPiso
        INNER JOIN estado ON habitacion.IdEstado = estado.IdEstado
        INNER JOIN categoria ON habitacion.IdCategoria = categoria.IdCategoria
        WHERE $condicion ORDER BY habitacion.Numero ASC";

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

    //piso, categoria, condicion hab
    public function mostrarPiso($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q= "SELECT IdPiso, Descripcion from ".$tabla." where ".$condicion.";";
        $db->selectQuery($q);
        $res = $db->getResult();
        //var_dump($res);
        return $res;
    }

    public function mostrarCategoria($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q= "SELECT IdCategoria, Descripcion from ".$tabla." where ".$condicion.";";
        $db->selectQuery($q);
        $res = $db->getResult();
        //var_dump($res);
        return $res;
    }    

    public function mostrarCondicionHabitacion($tabla,$condicion){
        $db = new Database();
        $db->connect();
        $q= "SELECT IdEstadoHabitacion, Descripcion from ".$tabla." where ".$condicion.";";
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
        //var_dump($res);
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