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
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAgregarClientes">Agregar Clientes</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>id </th>
                              <th>Codigo</th>
                              <th>cliente</th>
                              <th>contacto</th>
                              <th>telefono</th>
                              <th>email</th>
                              <th>tiempo_contrato</th>

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

                                <td>' . $value["tiempo_contrato"] . '</td>      ';


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


  <!--MODAL DE REGISTRO CLIENTE-->

  <div class="modal fade" id="modalAgregarClientes">
      <div class="modal-dialog">
          <div class="modal-content">
            <form action="" method="post">
              <div class="modal-header">
                  <h4 class="modal-title">Registrar Cliente</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

              <div class="row">
                <div class="col-6">
                <div class="form-group">
                      <label for="">Codigo Cliente</label>
                      <input type="text" class="form-control" name="nuevoCodigo"  placeholder="Codigo">
                  </div>
                  <div class="form-group">
                      <label >cliente</label>
                      <input type="text" class="form-control" name="nuevoCliente"  placeholder="Ingresar Nombre">
                  </div>
                  <div class="form-group">
                      <label >contacto</label>
                      <input type="text" class="form-control" name="nuevoContacto"  placeholder="Ingresar Numero">
                  </div>
                </div>
              <div class="col-6">
              <div class="form-group">
                      <label >telefono</label>
                      <input type="text" class="form-control" name="nuevoTelefono"  placeholder="Ingresar Celular">
                  </div>
                  <div class="form-group">
                      <label >email</label>
                      <input type="email" class="form-control" name="nuevoCorreo" placeholder="Correo">
                  </div>
                  <div class="form-group">
                      <label >tiempo contrato</label>
                      <input type="text" class="form-control" name="nuevoContrato"  placeholder="Contrato">
                  </div>
              </div>
            </div>
                  
                
                 

              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Registrar Cliente</button>
              </div>

              </form>

              <?php
              $crearCliente = new ControladorClientes();
              $crearCliente->ctrCrearCliente();

              
              ?>

          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>