<?php

class ControladorClientes
{

    //MOSTRAR LA LISTA DE LOS USUARIOS REGISTRADOS
    static public function ctrMostrarCliente($item, $valor)
    {

        $tabla = "cliente";

        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;
    }

    //CREACION DEL CLIENTE

    static public function  ctrCrearCliente()
    {

        if (isset($_POST["nuevoCodigo"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContacto"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"]) &&
                 preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
                 preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContacto"])
            ) {

                $tabla = "cliente";

                $datos = array(
                    "codigo" => $_POST["nuevoCodigo"],
                    "cliente" => $_POST["nuevoCliente"],
                     "contacto" => $_POST["nuevoContacto"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "email" => $_POST["nuevoEmail"],
                     "contrato" => $_POST["nuevoContrato"]
                );

                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);



                if ($respuesta == "ok") {

                    echo "<script>

                    Swal.fire({
    
                        icon: 'success',
    
                        title: '¡El cliente ha sido agregado!',
    
                        showConfirmButton: true,
    
                        confirmButtonText: 'Cerrar'
    
               
    
                        }).then(function(result){
    
               
    
                         if(result.value){
    
                                       
    
                            window.location = 'Clientes';
    
               
    
                        }
    
               });
    
               
    
                </script>";
                }
            } else {

                echo "<script>

                Swal.fire({

                    icon: 'error',

                    title: '¡El usuario no puede ir vacío o llevar caracteres especiales!',

                    showConfirmButton: true,

                    confirmButtonText: 'Cerrar'

           

                    }).then(function(result){

           

                     if(result.value){

                                   

                        window.location = 'Clientes';

           

                    }

           });

           

            </script>";
            }
        }
    }

        //edicion DEL CLIENTE

        static public function  ctrEditarCliente()
        {
    
            if (isset($_POST["editarCodigo"])) {
    
                if (
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarContacto"]) &&
                    preg_match('/^[0-9]+$/', $_POST["editarTelefono"]) &&
                     preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) &&
                     preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarContacto"])
                ) {
    
                    $tabla = "cliente";
    
                    $datos = array(
                        "id"=>$_POST["idCliente"],
                        "codigo" => $_POST["editarCodigo"],
                        "cliente" => $_POST["editarCliente"],
                         "contacto" => $_POST["editarContacto"],
                        "telefono" => $_POST["editarTelefono"],
                        "email" => $_POST["editarEmail"],
                         "contrato" => $_POST["editarContrato"]
                    );
    
                    $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
    
    
    
                    if ($respuesta == "ok") {
    
                        echo "<script>
    
                        Swal.fire({
        
                            icon: 'success',
        
                            title: '¡El cliente ha sido guardado!',
        
                            showConfirmButton: true,
        
                            confirmButtonText: 'Cerrar'
        
                   
        
                            }).then(function(result){
        
                   
        
                             if(result.value){
        
                                           
        
                                window.location = 'Clientes';
        
                   
        
                            }
        
                   });
        
                   
        
                    </script>";
                    }
                } else {
    
                    echo "<script>
    
                    Swal.fire({
    
                        icon: 'error',
    
                        title: '¡El usuario no puede ir vacío o llevar caracteres especiales!',
    
                        showConfirmButton: true,
    
                        confirmButtonText: 'Cerrar'
    
               
    
                        }).then(function(result){
    
               
    
                         if(result.value){
    
                                       
    
                            window.location = 'Clientes';
    
               
    
                        }
    
               });
    
               
    
                </script>";
                }
            }
        }


        //ELIMINAR CLIENTE


        static public function ctrEliminarCliente(){

            if(isset($_GET["idCliente"])){

                $tabla="cliente";
                $datos=$_GET["idCliente"];

                $respuesta=ModeloClientes::mdlEliminarCliente($tabla,$datos);


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
    
                                       
    
                            window.location = 'Clientes';
    
               
    
                        }
    
               });
    
               
    
                </script>";

                }

            }

        }
}
