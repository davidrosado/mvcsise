<?php
// Debug errores
ini_set('display_errors', '1'); // 1, -1
ini_set('display_startup_errors', '1'); // 1, -1
error_reporting(E_ALL);

//$base = 'https://nnp.obr.mybluehost.me/DAVID/sistema-hotel-v1';
$base = 'http://localhost/SISE/sistema-hotel-v1';
define("urlsite",$base);
define("urlcategoriahabitacion","$base/vista/categoria_habitacion/");
define("urlestadohabitacion","$base/vista/estado_habitacion/");
define("urlpisohabitacion","$base/vista/piso_habitacion/");
define("urlhabitacion","$base/vista/habitacion/");
define("urlproducto","$base/vista/producto/");
define("urltipopersona","$base/vista/tipo_persona/");
define("urlpersona","$base/vista/persona/");
define("urltipodocumento","$base/vista/tipo_documento/");
define("urlrecepcion","$base/vista/recepcion/");
define("urlestadorecepcion","$base/vista/estado_recepcion/");
define("urlventa","$base/vista/venta/");
define("urlestadoventa","$base/vista/estado_venta/");
?>