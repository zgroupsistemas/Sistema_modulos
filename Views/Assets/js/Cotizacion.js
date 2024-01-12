


/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCotizacion", function () {


    let idCotizacion = $(this).attr("idCotizacion");

    Swal.fire({


        title: '¿Está seguro de borrar la cotizacion?',

        text: "¡Si no lo está puede cancelar la acción!",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#3085d6',

        cancelButtonColor: '#d33',

        cancelButtonText: 'Cancelar',

        confirmButtonText: 'Si, borrar cotizacion!'


    }).then(function (result) {


        if (result.value) {


            window.location = "index.php?ruta=Cotizacion&idCotizacion=" + idCotizacion;


        }


    });

})