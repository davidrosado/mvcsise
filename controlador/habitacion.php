<?php
ob_start();
require_once("../../modelo/habitacion.php");
class habitacionController{
    private $model;
    public function __construct(){
        $this->model = new habitacion();
    }

    // mostrar
    public static function index(){
        clearstatcache();        
        $habitacion   = new habitacion();
        $dato       =   $habitacion->mostrarv2("habitacion","1");
        //var_dump($dato);
        require_once("../../vista/habitacion/listar.php");
    }

    //nuevo
    public static function nuevo(){
        $habitacion = new habitacion();
        $datoPiso   =   $habitacion->mostrarPiso("piso","1");
        $datoCategoria   =   $habitacion->mostrarCategoria("categoria","1");
        $datoCondicion   =   $habitacion->mostrarCondicionHabitacion("estado_habitacion","1");  
        $datoEstado       =   $habitacion->mostrarEstado("estado","1");        
        require_once("../../vista/habitacion/nuevo.php");
    }

    //guardar
    public static function guardar(){
        $numero= $_REQUEST['numero'];
        $detalle= $_REQUEST['detalle'];
        $precio= $_REQUEST['precio'];
        $dEstado= $_REQUEST['selectCondicion'];
        $dPiso= $_REQUEST['selectPiso'];
        $dCategoria= $_REQUEST['selectCategoria'];
        $estado= $_REQUEST['selectEstado'];
        $fecha= $_REQUEST['fecha'];

        $data = array('Numero'=>"$numero", 'Detalle'=>"$detalle", 'Precio'=>"$precio", 'IdEstadoHabitacion'=>"$dEstado", 'IdPiso'=>"$dPiso", 
        'IdCategoria'=>"$dCategoria", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");        
        $habitacion = new habitacion();
        $dato = $habitacion->insertarv2("habitacion",$data);
        if(!$dato){
            header("Location:".urlhabitacion);
            ob_end_flush();
        }
    }

    //editar
    public static function editar(){
        $id = $_REQUEST['id'];
        $habitacion = new habitacion();

        $dato = $habitacion->mostrarv2("habitacion","IdHabitacion =".$id);
        $datoPiso   =   $habitacion->mostrarPiso("piso","1");
        $datoCategoria   =   $habitacion->mostrarCategoria("categoria","1");
        $datoCondicion   =   $habitacion->mostrarCondicionHabitacion("estado_habitacion","1");              
        $datoEstado       =   $habitacion->mostrarEstado("estado","1");    
        /*var_dump($datoPiso);
        var_dump($datoEstado);
        var_dump($datoCategoria); 
        var_dump($datoCondicion); */
        require_once("../../vista/habitacion/editar.php");
    }

    //actualizar
    public static function actualizar(){
        $id = $_REQUEST['id'];
        $numero= $_REQUEST['numero'];
        $detalle= $_REQUEST['detalle'];
        $precio= $_REQUEST['precio'];
        $dEstado= $_REQUEST['selectCondicion'];
        $dPiso= $_REQUEST['selectPiso'];
        $dCategoria= $_REQUEST['selectCategoria'];
        $estado= $_REQUEST['selectEstado'];
        $fecha= $_REQUEST['fecha'];
        $data = array('Numero'=>"$numero", 'Detalle'=>"$detalle", 'Precio'=>"$precio", 'IdEstadoHabitacion'=>"$dEstado", 'IdPiso'=>"$dPiso", 
        'IdCategoria'=>"$dCategoria", 'IdEstado'=>"$estado", 'FechaCreacion'=>"$fecha");

        //var_dump($data);
        //$db->update($tabla,array('IdHabitacion'=>"3",'Correo'=>"name4@email.com"),$condicion); 
        $condicion  =  "IdHabitacion=".$id;

        $habitacion = new habitacion();
        $dato = $habitacion->actualizarv2("habitacion", $data, $condicion);
        //var_dump($dato);
        if(!$dato){
            header("Location:".urlhabitacion);
            ob_end_flush();
        }
    }

    //eliminar
    public static function eliminar(){
        $id = $_REQUEST['id'];
        $habitacion = new habitacion();
        $dato = $habitacion->eliminarv2("habitacion","IdHabitacion=".$id);
        //header("Location:".urlhabitacion);
        //echo '<script>alert("registro eliminado")</script>';
        print_r($dato);
        if(!$dato){
            header("Location:".urlhabitacion);
            ob_end_flush();
        }
    }
}?>