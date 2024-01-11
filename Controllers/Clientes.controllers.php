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

    static public function ctrCrearCliente()
    {

        if (isset($_POST["nuevoCodigo"])) {

            //preg mactch  permitir el registro solo con esos caracteres
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContacto"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoCorreo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContrato"])

            ) {


                $tabla = "cliente";

                $datos = array(

                    "codigo" => $_POST["nuevoCodigo"],
                    "cliente" => $_POST["nuevoCliente"],
                    "contacto" => $_POST["nuevoContacto"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "correo" => $_POST["nuevoCorreo"],
                    "contrato" => $_POST["nuevoContrato"]
                );

                $respuesta = ModeloClientes::mdlIngresarClientes($tabla, $datos);

                var_dump($respuesta);

                // if($respuesta=="ok"){
                //     echo '<script>
                    
                //     Swal.fire({
                       
                        
                //         icon: "Success",
                //         title: "El cliente ha sido guardado correctamente",
                //         showConfirmlButton: true,
                //         confirmButtonText: "Cerrar"
                //       }).then((result) => {
                //         if (result.isConfirmed) {
                          
                //             if (result.value) {

                                

                //                 }

                //         }
                //       });

                //     </script>';
                // }
            }
        }
    }
}
