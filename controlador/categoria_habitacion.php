<?php
ob_start();
require_once("../../modelo/categoria_habitacion.php");
class categoriaHabitacionController{
    private $model;
    public function __construct(){
        $this->model = new categoriaHabitacion();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $categoriaHabitacion  = new categoriaHabitacion();
        $dato       =   $categoriaHabitacion->mostrarv2("categoria","1");
        //var_dump($dato);
        require_once("../../vista/categoria_habitacion/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $categoriaHabitacion = new categoriaHabitacion();
        $datoEstado = $categoriaHabitacion->mostrarEstado("estado","1");    
        require_once("../../vista/categoria_habitacion/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];  
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        $categoriaHabitacion= new categoriaHabitacion();
        $dato = $categoriaHabitacion->insertarv2("categoria",$data);
        if(!$dato){
            header("Location:".urlcategoriahabitacion);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $categoriaHabitacion= new categoriaHabitacion();
        $dato = $categoriaHabitacion->mostrarv2("categoria","IdCategoria=".$id);
        $datoEstado       =   $categoriaHabitacion->mostrarEstado("estado","1");   
        require_once("../../vista/categoria_habitacion/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $descripcion= $_REQUEST['descripcion'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('Descripcion'=>"$descripcion", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");
        //$db->update($tabla,array('IdTipoDocumento'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdCategoria=".$id;

        $categoriaHabitacion= new categoriaHabitacion();
        $dato = $categoriaHabitacion->actualizarv2("categoria", $data, $condicion);
        if(!$dato){
            header("Location:".urlcategoriahabitacion);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $categoriaHabitacion= new categoriaHabitacion();
        $dato = $categoriaHabitacion->eliminarv2("categoria","IdCategoria=".$id);
        //print_r($dato);
        if(!$dato){
            echo '<script>alert("registro eliminado")</script>';
            header("Location:".urlcategoriahabitacion);
            ob_end_flush();
        }
    }
}?>