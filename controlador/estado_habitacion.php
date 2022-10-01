<?php
ob_start();
require_once("../../modelo/estado_habitacion.php");
class estadoHabitacionController{
    private $model;
    public function __construct(){
        $this->model = new estadoHabitacion();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $estadoHabitacion  = new estadoHabitacion();
        $dato       =   $estadoHabitacion->mostrarv2("estado_habitacion","1");
        //var_dump($dato);
        require_once("../../vista/estado_habitacion/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $estadoHabitacion = new estadoHabitacion();
        $datoEstado = $estadoHabitacion->mostrarEstado("estado","1");    
        require_once("../../vista/estado_habitacion/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];  
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        $estadoHabitacion= new estadoHabitacion();
        $dato = $estadoHabitacion->insertarv2("estado_habitacion",$data);
        if(!$dato){
            header("Location:".urlestadohabitacion);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $estadoHabitacion= new estadoHabitacion();
        $dato = $estadoHabitacion->mostrarv2("estado_habitacion","IdEstadoHabitacion=".$id);
        $datoEstado       =   $estadoHabitacion->mostrarEstado("estado","1");   
        require_once("../../vista/estado_habitacion/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdEstadoHabitacion=".$id;

        $estadoHabitacion= new estadoHabitacion();
        $dato = $estadoHabitacion->actualizarv2("estado_habitacion", $data, $condicion);
        if(!$dato){
            header("Location:".urlestadohabitacion);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $estadoHabitacion= new estadoHabitacion();
        $dato = $estadoHabitacion->eliminarv2("estado_habitacion","IdEstadoHabitacion=".$id);
        //print_r($dato);
        if(!$dato){
            echo '<script>alert("registro eliminado")</script>';
            header("Location:".urlestadohabitacion);
            ob_end_flush();
        }
    }
}?>