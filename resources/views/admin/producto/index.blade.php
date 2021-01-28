@extends('layouts.admin')

@section('titulo', 'Producto')

@section('contenedor')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h5 class="card-title">Lista de Productos</h5>
                <a href="#" class="btn btn-success btn-sm ml-auto" data-toggle="modal" data-target="#modalAgregarUsuario">
                    <i class="fas fa-cloud-upload-alt"></i> Nuevo Producto
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Coca Cola</td>
                            <td>12,5</td>
                            <td>19</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">Disponible</a>
                            </td>
                            <td>/img/coca.png</td>
                            <td>Bebida de 2lts</td>
                            <td>2021-01-26</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="" class="btn btn-outline-primary">Ver</a>
                                    <a href="" class="btn btn-outline-primary">Editar</a>
                                    <a href="" class="btn btn-outline-primary">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pepsi</td>
                            <td>11</td>
                            <td>24</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">Disponible</a>
                            </td>
                            <td>/img/pepsi.png</td>
                            <td>Bebida de 2lts</td>
                            <td>2021-01-26</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="" class="btn btn-outline-primary">Ver</a>
                                    <a href="" class="btn btn-outline-primary">Editar</a>
                                    <a href="" class="btn btn-outline-primary">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pan</td>
                            <td>12,5</td>
                            <td>267</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">Disponible</a>
                            </td>
                            <td>/img/pan.png</td>
                            <td>Pan para comer</td>
                            <td>2021-01-26</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="" class="btn btn-outline-primary">Ver</a>
                                    <a href="" class="btn btn-outline-primary">Editar</a>
                                    <a href="" class="btn btn-outline-primary">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAgregarUsuario" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" role="form" method="post" enctype="multipart/form-data"">
                @csrf
                <div class="modal-header" style="background: #3c8dbc; color: white;"">
                    <h4 class="modal-title">Agregar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="newNombre" placeholder="Ingresar Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="newUsuario" placeholder="Ingresar Usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="newPassword" placeholder="Ingresar Contraseña" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="newPerfil">
                                    <option value="">Selecciona Perfil...</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="newFoto" name="newFoto">
                            <p class="help-block">Peso máximo de la foto 2 MB</p>
                            <img src="" class="img-thumbnail ver" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================
=               Modal Agregar Usuario             =
================================================-->

<div class="modal fade" id="modalAgregarUsuarioASD" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data"">
                @csrf
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="newNombre" placeholder="Ingresar Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="newUsuario" placeholder="Ingresar Usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="newPassword" placeholder="Ingresar Contraseña" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="newPerfil">
                                    <option value="">Selecciona Perfil...</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="newFoto" name="newFoto">
                            <p class="help-block">Peso máximo de la foto 2 MB</p>
                            <img src="" class="img-thumbnail ver" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')
    })
</script>
@endsection

