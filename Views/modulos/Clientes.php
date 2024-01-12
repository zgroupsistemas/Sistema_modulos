  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administrar Clientes</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                          <li class="breadcrumb-item active">Administrar Clientes</li>
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
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Clientes</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped tablas">
                      <thead>
                          <tr>
                              <th>id </th>
                              <th>Codigo</th>
                              <th>cliente</th>
                              <th>contacto</th>
                              <th>telefono</th>
                              <th>email</th>
                              <th>tiempo_contrato</th>
                              <th>Acciones</th>


                          </tr>
                      </thead>
                      <tbody>

                          <?php

                            $item = null;
                            $valor = null;

                            $Clientes = ControladorClientes::ctrMostrarCliente($item, $valor);

                            foreach ($Clientes as $key => $value) {


                                echo '<tr>';

                                echo '<td>' . ($key + 1) . '</td>

                            <td>' . $value["codigo_cliente"] . '</td>

                                <td>' . $value["cliente"] . '</td>

                                <td>' . $value["contacto"] . '</td>

                                <td>' . $value["telefono"] . '</td>

                                <td>' . $value["email"] . '</td>

                                <td>' . $value["tiempo_contrato"] . '</td>      
                                
                                <td> <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id"] . '"><i class="fas fa-times-circle"></i></button>
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
MODAL AGREGAR CLIENTE
======================================-->

  <div id="modalAgregarCliente" class="modal fade" role="dialog">

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

                                  <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Codigo" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL DOCUMENTO ID -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                  <input type="text" min="0" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar  Cliente" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL EMAIL -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                  <input type="text" class="form-control input-lg" name="nuevoContacto" placeholder="Ingresar Contacto" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL TELÉFONO -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA LA DIRECCIÓN -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                  <input type="text" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Correo" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                  <input type="text" class="form-control input-lg" name="nuevoContrato" placeholder="Ingresar  Contrato " required>

                              </div>

                          </div>

                      </div>

                  </div>

                  <!--=====================================
        PIE DEL MODAL
        ======================================-->

                  <div class="modal-footer">

                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                      <button type="submit" class="btn btn-primary">Guardar cliente</button>

                  </div>

                  <?php
                    $crearCliente = new ControladorClientes();
                    $crearCliente->ctrCrearCliente();

                    ?>
              </form>

          </div>

      </div>

  </div>



  <!--=====================================
MODAL EDITAR CLIENTE
======================================-->

  <div id="modalEditarCliente" class="modal fade" role="dialog">

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

                                  <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" placeholder="Ingresar Codigo" required>
                                  <input type="hidden" id="idCliente" name="idCliente">
                              </div>

                          </div>

                          <!-- ENTRADA PARA EL DOCUMENTO ID -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                  <input type="text" min="0" class="form-control input-lg" name="editarCliente" id="editarCliente" placeholder="Ingresar  Cliente" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL EMAIL -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                  <input type="text" class="form-control input-lg" name="editarContacto" id="editarContacto" placeholder="Ingresar Contacto" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA EL TELÉFONO -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                  <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA LA DIRECCIÓN -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                  <input type="text" class="form-control input-lg" name="editarEmail" id="editarEmail" placeholder="Ingresar Correo" required>

                              </div>

                          </div>

                          <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                          <div class="form-group">

                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                  <input type="text" class="form-control input-lg" name="editarContrato" id="editarContrato" placeholder="Ingresar  Contrato " required>

                              </div>

                          </div>

                      </div>

                  </div>

                  <!--=====================================
  PIE DEL MODAL
  ======================================-->

                  <div class="modal-footer">

                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                  </div>

                  <?php
                    $editarCliente = new ControladorClientes();
                    $editarCliente->ctrEditarCliente();

                    ?>
              </form>

          </div>

      </div>

  </div>

  <?php
    $eliminarCliente = new ControladorClientes();
    $eliminarCliente->ctrEliminarCliente();

    ?>