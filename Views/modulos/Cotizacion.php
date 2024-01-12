  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administrar Cotizacion</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                          <li class="breadcrumb-item active">Administrar Cotizacion</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAgregarCotizacion">Agregar Cotizacion</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped tablas">
                      <thead>
                          <tr>
                              <th>id </th>
                              <th>N° de Cotizacion</th>
                              <th>cliente</th>
                              <th>monto</th>
                              <th>asunto</th>
                              <th>Acciones</th>



                          </tr>
                      </thead>
                      <tbody>

                          <?php

                            $item = null;
                            $valor = null;

                            $Cotizacion = ControladorCotizacion::ctrMostrarCotizacion($item, $valor);

                            foreach ($Cotizacion as $key => $value) {


                                echo '<tr>';

                                echo '<td>' . ($key + 1) . '</td>';

                                echo ' <td>' . $value["numero_cotizacion"] . '</td>';

                                $itemCliente = "id";
                                $valorCliente = $value["cliente_id"];

                                $respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);


                                if (is_array($respuestaCliente)) {

                                    echo '<td>' . $respuestaCliente["cliente"] . '</td>';
                                }

                                echo ' <td>' . $value["monto"] . '</td>';

                                echo '  <td>' . $value["asunto"] . '</td>    
                              
                              <td> <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-warning btnEditarCotizacion" data-toggle="modal" data-target="#modalEditarCotizacion" idCotizacion="' . $value["id"] . '"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-danger btnEliminarCotizacion" idCotizacion="' . $value["id"] . '"><i class="fas fa-times-circle"></i></button>
                              </div>
                              ';




                                echo '</tr>';
                            }

                            ?>





                      </tbody>

                  </table>
              </div>
              <!-- /.card-body -->
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!--=====================================
MODAL AGREGAR COTIZACION
======================================-->

  <div id="modalAgregarCotizacion" class="modal fade" role="dialog">

      <div class="modal-dialog">

          <div class="modal-content">

              <form role="form" method="post">

                  <!--=====================================
  CABEZA DEL MODAL
  ======================================-->

                  <div class="modal-header" style="background:#3c8dbc; color:white">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                      <h4 class="modal-title">Agregar cliente</h4>

                  </div>

                  <!--=====================================
  CUERPO DEL MODAL
  ======================================-->

                  <div class="modal-body">

                      <div class="box-body">

                          <!-- ENTRADA PARA EL NOMBRE -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                  <input type="text" class="form-control input-lg" name="nuevoCotizacion" placeholder="Ingresar N° cotizacion" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL DOCUMENTO ID -->

                          <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                  <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                                      <option value="">Seleccionar cliente</option>

                                      <?php

                                        $item = null;
                                        $valor = null;

                                        $Clientes = ControladorClientes::ctrMostrarCliente($item, $valor);

                                        foreach ($Clientes as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["cliente"] . '</option>';
                                        }

                                        ?>

                                  </select>

                              </div>

                          </div>
                          <!-- ENTRADA PARA EL EMAIL -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                  <input type="number" min="0" class="form-control input-lg" name="nuevoMonto" placeholder="Ingresar Monto" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL TELÉFONO -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                  <input type="text" class="form-control input-lg" name="nuevoAsunto" placeholder="Ingresar Asunto" required>

                              </div>

                          </div>




                      </div>

                  </div>

                  <!--=====================================
  PIE DEL MODAL
  ======================================-->

                  <div class="modal-footer">

                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                      <button type="submit" class="btn btn-primary">Guardar Cotizacion</button>

                  </div>

                  <?php
                    $crearCotizacion = new ControladorCotizacion();
                    $crearCotizacion->ctrCrearCotizacion();

                    ?>
              </form>

          </div>

      </div>

  </div>


  <!--=====================================
MODAL EDITAR COTIZACION
======================================-->

  <div id="modalEditarCotizacion" class="modal fade" role="dialog">

      <div class="modal-dialog">

          <div class="modal-content">

              <form role="form" method="post">

                  <!--=====================================
  CABEZA DEL MODAL
  ======================================-->

                  <div class="modal-header" style="background:#3c8dbc; color:white">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                      <h4 class="modal-title">EDITAR COTIZACION</h4>

                  </div>

                  <!--=====================================
  CUERPO DEL MODAL
  ======================================-->

                  <div class="modal-body">

                      <div class="box-body">


                          <?php

                        

                            $itemCliente = "id";
                            $valorCliente = $venta["id_cliente"];

                            $cliente = ControladorClientes::ctrMostrarCliente($itemCliente, $valorCliente);



                            ?>


                          <!-- ENTRADA PARA EL NOMBRE -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                  <input type="text" class="form-control input-lg" name="editarCotizacion" id="editarCotizacion" placeholder="Ingresar N° cotizacion" required>
                                  <input type="hidden" id="idCotizacion" name="idCotizacion">
                              </div>

                          </div>

                          <!-- ENTRADA PARA EL DOCUMENTO ID -->

                          <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                  <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                                      <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nombre"]; ?></option>

                                      <?php

                                        $item = null;
                                        $valor = null;

                                        $categorias = ControladorClientes::ctrMostrarCliente($item, $valor);

                                        foreach ($categorias as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["cliente"] . '</option>';
                                        }

                                        ?>

                                  </select>



                              </div>

                          </div>
                          <!-- ENTRADA PARA EL EMAIL -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                  <input type="number" min="0" class="form-control input-lg" name="editarMonto" id="editarMonto" placeholder="Ingresar Monto" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL TELÉFONO -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                  <input type="text" class="form-control input-lg" name="editarAsunto" id="editarAsunto" placeholder="Ingresar Asunto" required>

                              </div>

                          </div>




                      </div>

                  </div>

                  <!--=====================================
  PIE DEL MODAL
  ======================================-->

                  <div class="modal-footer">

                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                      <button type="submit" class="btn btn-primary">Guardar Cotizacion</button>

                  </div>


              </form>

          </div>

      </div>

  </div>

  <?php

    $eliminarCotizacion = new ControladorCotizacion();
    $eliminarCotizacion->ctrEliminarCotizacion();

    ?>