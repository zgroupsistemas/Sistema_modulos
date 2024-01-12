<?php


class ControladorCotizacion {

 //MOSTRAR LA LISTA DE LAS COTIZACIONES REGISTRADAS
 static public function ctrMostrarCotizacion($item, $valor)
 {

     $tabla = "cotizacion";

     $respuesta = ModeloCotizacion::mdlMostrarCotizacion($tabla, $item, $valor);

     return $respuesta;
 }

 //CREACION DEL CLIENTE

 static public function  ctrCrearCotizacion()
    {

        if (isset($_POST["nuevoCotizacion"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoMonto"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsunto"]) 
            ) {

                $tablaClientes = "cliente";

                $item = "id";
                $valor = $_POST["seleccionarCliente"];

                $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

                $tabla = "cotizacion";

                $datos = array(
                    "cotizacion" => $_POST["nuevoCotizacion"],
                    "cliente" => $_POST["seleccionarCliente"],
                     "monto" => $_POST["nuevoMonto"],
                    "asunto" => $_POST["nuevoAsunto"]
                   
                );

                $respuesta = ModeloCotizacion::mdlIngresarCotizacion($tabla, $datos);



                if ($respuesta == "ok") {

                    echo "<script>

                    Swal.fire({
    
                        icon: 'success',
    
                        title: '¡La cotizacion ha sido agregado!',
    
                        showConfirmButton: true,
    
                        confirmButtonText: 'Cerrar'
    
               
    
                        }).then(function(result){
    
               
    
                         if(result.value){
    
                                       
    
                            window.location = 'Cotizacion';
    
               
    
                        }
    
               });
    
               
    
                </script>";
                }
            } else {

                echo "<script>

                Swal.fire({

                    icon: 'error',

                    title: '¡La cotizacion no puede ir vacío o llevar caracteres especiales!',

                    showConfirmButton: true,

                    confirmButtonText: 'Cerrar'

           

                    }).then(function(result){

           

                     if(result.value){

                                   

                        window.location = 'Cotizacion';

           

                    }

           });

           

            </script>";
            }
        }
    }

     //edicion DEL CLIENTE


     //ELIMINAR CLIENTE


      static public function ctrEliminarCotizacion(){

          if(isset($_GET["idCotizacion"])){

              $tabla="Cotizacion";
              $datos=$_GET["idCotizacion"];

              $respuesta = ModeloCotizacion::mdlEliminarCotizacion($tabla,$datos);


              if($respuesta =="ok"){

                  echo "<script>

                  Swal.fire({
 
                      icon: 'success',
 
                      title: '¡El cliente ha sido borrado correctamente!',
 
                      showConfirmButton: true,
 
                      confirmButtonText: 'Cerrar'
 
                      closeOnConfirm: false
 
                      }).then(function(result){
 
            
 
                       if(result.value){
 
                                    
 
                          window.location = 'Cotizacion';
 
            
 
                      }
 
             });
 
            
 
              </script>";

              }

          }

      }
    


}