<?php
class recepcion{
    private $recepcion;
    private $db;
    public function __construct(){
        $this->recepcion = array();
        /*$this->estadosHabitacion = [];
        $this->pisoHabitacion = [];
        $this->categoriaHabitacion = [];*/

       require_once('db.php');
    }
    public function insertar($tabla, $data){
        $consulta="insert into ".$tabla." values(null,". $data .")";
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
     }

    // FUNCION MOSTRAR
    public function mostrar($tabla,$condicion){
        $consul = "SELECT recepcion.IdRecepcion, persona.Documento as DNICliente, persona.Nombre, persona.Apellido, habitacion.Numero as NumeroHabitacion, 
        recepcion.FechaEntrada, estado_recepcion.Descripcion as Estado
        FROM $tabla INNER JOIN persona ON persona.IdPersona = recepcion.IdCliente 
        INNER JOIN habitacion ON habitacion.IdHabitacion = recepcion.IdHabitacion 
        INNER JOIN estado_recepcion ON estado_recepcion.IdEstadoRecepcion = recepcion.IdEstadoRecepcion 
        WHERE $condicion";

        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->recepcion[]=$filas;
        }
        return $this->recepcion;
    } 

    public function actualizar($tabla, $data, $condicion){       
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        //$consulta = "UPDATE persona SET IdTipoDocumento=2, Documento='42777710', Nombre='David', Apellido='Rosado', Correo='drosado1901@gmail.com', Clave='123456', IdTipoPersona=2, IdEstado=2, FechaCreacion='2022-09-25' WHERE IdPersona=1";

        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }

    public function eliminar($tabla, $condicion){
        $eli="delete from ".$tabla." where ".$condicion;
        $res=$this->db->query($eli);
        if ($res) {
            return true; 
        }else {
            return false;
        }
    }
}?>