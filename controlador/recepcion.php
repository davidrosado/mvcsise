<?php
ob_start();
require_once("../../modelo/recepcion.php");
class recepcionController{
    private $model;
    public function __construct(){
        $this->model = new recepcion();
    }
    
    // mostrar
    static function index(){
        $recepcion   = new recepcion();
        $dato       =  $recepcion->mostrar("recepcion","1");
        require_once("../../vista/recepcion/listar.php");
    }

    //nuevo
    static function nuevo(){        
        $recepcion = new recepcion();
        require_once("../../vista/recepcion/nuevo.php");
    }
    
    //guardar
    static function guardar(){
        $numero= $_REQUEST['numero'];
        $detalle= $_REQUEST['detalle'];
        $precio= $_REQUEST['precio'];
        $dEstado= $_REQUEST['sEstado'];
        $dPiso= $_REQUEST['sPiso'];
        $dCategoria= $_REQUEST['sCategoria'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        //$data = "'".$descripcion."',$estado,'".$fecha."'";
        $data = "$numero, '".$detalle."', $precio, $dEstado, $dPiso, $dCategoria, $estado, '".$fecha."' ";
        $recepcion = new recepcion();
        $dato = $recepcion->insertar("recepcion",$data);
        //var_dump($dato);
        if($dato){
            header("Location:".urlrecepcion);
            ob_end_flush();
        }
    }

    //editar 
    static function editar(){    
        $id = $_REQUEST['id'];
        $recepcion = new recepcion();
        $dato = $recepcion->mostrar("recepcion","IdRecepcion =".$id);  
        require_once("../../vista/recepcion/editar.php");
    }

    //actualizar
    static function actualizar(){
        $id = $_REQUEST['id'];
        $numero= $_REQUEST['numero'];
        $detalle= $_REQUEST['detalle'];
        $precio= $_REQUEST['precio'];
        $dEstado= $_REQUEST['sEstado'];
        $dPiso= $_REQUEST['sPiso'];
        $dCategoria= $_REQUEST['sCategoria'];
        $estado= $_REQUEST['estado'];
        $fecha= $_REQUEST['fecha'];
        $data = 'Numero='.$numero.', Detalle="'.$detalle.'", Precio='.$precio.', IdEstadorecepcion='.$dEstado.', IdPiso='.$dPiso.', IdCategoria='.$dCategoria.', Estado='.$estado.', FechaCreacion="'.$fecha.'"';
        $condicion  =  "IdRecepcion=".$id;
        $recepcion = new recepcion();
        $dato = $recepcion->actualizar("recepcion", $data ,$condicion);
        if($dato){
            header("Location:".urlrecepcion);
            ob_end_flush();
        }
    }

    //eliminar
    static function eliminar(){    
        $id = $_REQUEST['id'];
        $recepcion = new recepcion();
        $dato = $recepcion->eliminar("recepcion","IdRecepcion=".$id);
        if($dato){
            header("Location:".urlrecepcion);
            ob_end_flush();
        }
    }
}?>