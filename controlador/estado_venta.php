<?php
ob_start();
require_once("../../modelo/tipo_documento.php");
class tipoDocumentoController{
    private $model;
    public function __construct(){
        $this->model = new tipoDocumento();
    }
    
    // mostrar
    static function index(){
        $estadoVenta   = new tipoDocumento();
        $dato       =   $estadoVenta->mostrar("tipo_documento","1");
        require_once("../../vista/tipo_documento/listar.php");
    }

    //nuevo
    static function nuevo(){        
        require_once("../../vista/tipo_documento/nuevo.php");
    }
    
    //guardar
    static function guardar(){
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = "'".$descripcion."',$estado,'".$fecha."'";
        $estadoVenta = new tipoDocumento();
        $dato = $estadoVenta->insertar("tipo_documento",$data);
        if($dato){
            header("Location:".urltipodocumento);
            ob_end_flush();
        }
    }

    //editar 
    static function editar(){    
        $id = $_REQUEST['id'];
        $estadoVenta = new tipoDocumento();
        $dato = $estadoVenta->mostrar("tipo_documento","IdTipoDocumento=".$id);        
        require_once("../../vista/tipo_documento/editar.php");
    }

    //actualizar
    static function actualizar(){
        $id = $_REQUEST['id'];
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];

        $data ='Descripcion="'.$descripcion.'", IdEstado='.$estado.', FechaCreacion="'.$fecha.'"';
        $condicion  ="IdTipoDocumento=".$id;
        $estado =new tipoDocumento();
        $dato =$estado->actualizar("tipo_documento",$data,$condicion);
        if($dato){
            header("Location:".urltipodocumento);
            ob_end_flush();
        }
    }

    //eliminar
    static function eliminar(){    
        $id = $_REQUEST['id'];
        $estadoVenta = new tipoDocumento();
        $dato = $estadoVenta->eliminar("tipo_documento","IdTipoDocumento=".$id);
        if($dato){
            header("Location:".urltipodocumento);
            ob_end_flush();
        }
    }
}?>