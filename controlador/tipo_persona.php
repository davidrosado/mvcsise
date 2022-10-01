<?php
ob_start();
require_once("../../modelo/tipo_persona.php");
class tipoPersonaController{
    private $model;
    public function __construct(){
        $this->model = new tipoPersona();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $tipoPersona  = new tipoPersona();
        $dato       =   $tipoPersona->mostrarv2("tipo_persona","1");
        //var_dump($dato);
        require_once("../../vista/tipo_persona/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $tipoPersona = new tipoPersona();
        $datoEstado = $tipoPersona->mostrarEstado("estado","1");    
        require_once("../../vista/tipo_persona/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];  
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        $tipoPersona= new tipoPersona();
        $dato = $tipoPersona->insertarv2("tipo_persona",$data);
        if(!$dato){
            header("Location:".urltipopersona);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $tipoPersona= new tipoPersona();
        $dato = $tipoPersona->mostrarv2("tipo_persona","IdTipoPersona =".$id);
        $datoEstado       =   $tipoPersona->mostrarEstado("estado","1");   
        require_once("../../vista/tipo_persona/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdTipoPersona=".$id;

        $tipoPersona= new tipoPersona();
        $dato = $tipoPersona->actualizarv2("tipo_persona", $data, $condicion);
        if(!$dato){
            header("Location:".urltipopersona);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $tipoPersona= new tipoPersona();
        $dato = $tipoPersona->eliminarv2("tipo_persona","IdTipoPersona=".$id);
        //print_r($dato);
        if(!$dato){
            echo '<script>alert("registro eliminado")</script>';
            header("Location:".urltipopersona);
            ob_end_flush();
        }
    }
}?>