<?php
ob_start();
require_once("../../modelo/tipo_documento.php");
class tipoDocumentoController{
    private $model;
    public function __construct(){
        $this->model = new tipoDocumento();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $tipoPersona  = new tipoDocumento();
        $dato       =   $tipoPersona->mostrarv2("tipo_documento","1");
        //var_dump($dato);
        require_once("../../vista/tipo_documento/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $tipoPersona = new tipoDocumento();
        $datoEstado = $tipoPersona->mostrarEstado("estado","1");    
        require_once("../../vista/tipo_documento/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];  
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        $tipoPersona= new tipoDocumento();
        $dato = $tipoPersona->insertarv2("tipo_documento",$data);
        if(!$dato){
            header("Location:".urltipodocumento);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $tipoPersona= new tipoDocumento();
        $dato = $tipoPersona->mostrarv2("tipo_documento","IdTipoDocumento =".$id);
        $datoEstado       =   $tipoPersona->mostrarEstado("estado","1");   
        require_once("../../vista/tipo_documento/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdTipoDocumento=".$id;

        $tipoPersona= new tipoDocumento();
        $dato = $tipoPersona->actualizarv2("tipo_documento", $data, $condicion);
        if(!$dato){
            header("Location:".urltipodocumento);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $tipoPersona= new tipoDocumento();
        $dato = $tipoPersona->eliminarv2("tipo_documento","IdTipoDocumento=".$id);
        //print_r($dato);
        if(!$dato){
            echo '<script>alert("registro eliminado")</script>';
            header("Location:".urltipodocumento);
            ob_end_flush();
        }
    }
}?>