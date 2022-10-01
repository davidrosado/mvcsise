<?php
ob_start();
require_once("../../modelo/estado_recepcion.php");
class estadoRecepcionController{
    private $model;
    public function __construct(){
        $this->model = new estadoRecepcion();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $estadoRecepcion  = new estadoRecepcion();
        $dato       =   $estadoRecepcion->mostrarv2("estado_recepcion","1");
        //var_dump($dato);
        require_once("../../vista/estado_recepcion/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $estadoRecepcion = new estadoRecepcion();
        $datoEstado = $estadoRecepcion->mostrarEstado("estado","1");    
        require_once("../../vista/estado_recepcion/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];  
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        $estadoRecepcion= new estadoRecepcion();
        $dato = $estadoRecepcion->insertarv2("estado_recepcion",$data);
        if(!$dato){
            header("Location:".urlestadorecepcion);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $estadoRecepcion= new estadoRecepcion();
        $dato = $estadoRecepcion->mostrarv2("estado_recepcion","IdEstadoRecepcion=".$id);
        $datoEstado       =   $estadoRecepcion->mostrarEstado("estado","1");   
        require_once("../../vista/estado_recepcion/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdEstadoRecepcion=".$id;

        $estadoRecepcion= new estadoRecepcion();
        $dato = $estadoRecepcion->actualizarv2("estado_recepcion", $data, $condicion);
        if(!$dato){
            header("Location:".urlestadorecepcion);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $estadoRecepcion= new estadoRecepcion();
        $dato = $estadoRecepcion->eliminarv2("estado_recepcion","IdEstadoRecepcion=".$id);
        //print_r($dato);
        if(!$dato){
            echo '<script>alert("registro eliminado")</script>';
            header("Location:".urlestadorecepcion);
            ob_end_flush();
        }
    }
}?>