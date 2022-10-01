<?php
ob_start();
require_once("../../modelo/persona.php");
class personaController{
    private $model;
    public function __construct(){
        $this->model = new persona();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $persona   = new persona();
        $dato       =   $persona->mostrarv2("persona","1");
        //var_dump($dato);
        require_once("../../vista/persona/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $persona = new persona();
        $datoTipoDocumento   =   $persona->mostrarTipoDocumento("tipo_documento","1");
        $datoEstado       =   $persona->mostrarEstado("estado","1");
        $datoTipoPersona  =   $persona->mostrarRol("tipo_persona","1");           
        require_once("../../vista/persona/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $nroDocumento= $_REQUEST['Documento'];
        $nombre= $_REQUEST['Nombre'];
        $apellido= $_REQUEST['Apellido'];
        $correo= $_REQUEST['Correo'];
        $clave= $_REQUEST['Clave'];
        $rol= $_REQUEST['IdTipoPersona'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $tipoDocumento= $_REQUEST['TipoDocumento'];     
        $data = array('Documento'=>"$nroDocumento", 'Nombre'=>"$nombre", 'Apellido'=>"$apellido", 'Correo'=>"$correo", 
        'IdTipoPersona'=>"$rol", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha", 'IdTipoDocumento'=>"$tipoDocumento");
        $persona = new persona();
        $dato = $persona->insertarv2("persona",$data);
        if(!$dato){
            header("Location:".urlpersona);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $persona = new persona();

        $dato = $persona->mostrarv2("persona","IdPersona =".$id);
        $datoTipoDocumento   =   $persona->mostrarTipoDocumento("tipo_documento","1");
        $datoEstado       =   $persona->mostrarEstado("estado","1");
        $datoTipoPersona  =   $persona->mostrarRol("tipo_persona","1");       
        /*var_dump($datoTipoDocumento);
        var_dump($datoEstado);
        var_dump($datoTipoPersona);    */ 
        require_once("../../vista/persona/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $tipoDocumento= $_REQUEST['TipoDocumento'];
        $nroDocumento= $_REQUEST['Documento'];
        $nombre= $_REQUEST['Nombre'];
        $apellido= $_REQUEST['Apellido'];
        $correo= $_REQUEST['Correo'];
        $rol= $_REQUEST['IdTipoPersona'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('IdTipoDocumento'=>"$tipoDocumento", 'Documento'=>"$nroDocumento", 'Nombre'=>"$nombre", 'Apellido'=>"$apellido", 'Correo'=>"$correo", 
        'IdTipoPersona'=>"$rol", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdPersona=".$id;

        $persona = new persona();
        $dato = $persona->actualizarv2("persona", $data, $condicion);
        if(!$dato){
            header("Location:".urlpersona);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $persona = new persona();
        $dato = $persona->eliminarv2("persona","IdPersona=".$id);
        //header("Location:".urlpersona);
        //echo '<script>alert("registro eliminado")</script>';
        print_r($dato);
        if(!$dato){
            header("Location:".urlpersona);
            ob_end_flush();
        }
    }
}?>