<?php


class ControladorCotizacion {

 //MOSTRAR LA LISTA DE LAS COTIZACIONES REGISTRADAS
 static public function ctrMostrarCotizacion($item, $valor)
 {

     $tabla = "cotizacion";

     $respuesta = ModeloCotizacion::mdlMostrarCotizacion($tabla, $item, $valor);

     return $respuesta;
 }

 
    


}