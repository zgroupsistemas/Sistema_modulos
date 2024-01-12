/*=============================================
EDITAR CLIENTE
=============================================*/

$(".tablas").on("click", ".btnEditarCliente", function () {

    let idCliente = $(this).attr("idCliente");


    let datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {



            $("#idCliente").val(respuesta["id"]);
            $("#editarCodigo").val(respuesta["codigo_cliente"]);
            $("#editarCliente").val(respuesta["cliente"]);
            $("#editarContacto").val(respuesta["contacto"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarEmail").val(respuesta["email"]);
            $("#editarContrato").val(respuesta["tiempo_contrato"]);
        }


    })

})


/*=============================================
ELIMINAR CLIENTE
=============================================*/

$(".tablas").on("click", ".btnEliminarCliente", function () {


    let idCliente = $(this).attr("idCliente");




    Swal.fire({


        title: '¿Está seguro de borrar el cliente?',

        text: "¡Si no lo está puede cancelar la acción!",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#3085d6',

        cancelButtonColor: '#d33',

        cancelButtonText: 'Cancelar',

        confirmButtonText: 'Si, borrar cliente!'


    }).then(function (result) {


        if (result.value) {


            window.location = "index.php?ruta=Clientes&idCliente=" + idCliente;


        }


    });

})