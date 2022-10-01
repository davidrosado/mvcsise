<?php
ob_start();
require_once("../../modelo/piso_habitacion.php");
class pisoHabitacionController{
    private $model;
    public function __construct(){
        $this->model = new pisoHabitacion();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $pisoHabitacion  = new pisoHabitacion();
        $dato       =   $pisoHabitacion->mostrarv2("piso","1");
        //var_dump($dato);
        require_once("../../vista/piso_habitacion/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $pisoHabitacion = new pisoHabitacion();
        $datoEstado = $pisoHabitacion->mostrarEstado("estado","1");    
        require_once("../../vista/piso_habitacion/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];  
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        $pisoHabitacion= new pisoHabitacion();
        $dato = $pisoHabitacion->insertarv2("piso",$data);
        if(!$dato){
            header("Location:".urlpisohabitacion);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $pisoHabitacion= new pisoHabitacion();
        $dato = $pisoHabitacion->mostrarv2("piso","IdPiso=".$id);
        $datoEstado       =   $pisoHabitacion->mostrarEstado("estado","1");   
        require_once("../../vista/piso_habitacion/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdPiso=".$id;

        $pisoHabitacion= new pisoHabitacion();
        $dato = $pisoHabitacion->actualizarv2("piso", $data, $condicion);
        if(!$dato){
            header("Location:".urlpisohabitacion);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $pisoHabitacion= new pisoHabitacion();
        $dato = $pisoHabitacion->eliminarv2("piso","IdPiso=".$id);
        //print_r($dato);
        if(!$dato){
            echo '<script>alert("registro eliminado")</script>';
            header("Location:".urlpisohabitacion);
            ob_end_flush();
        }
    }
}?>