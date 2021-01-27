@extends('layouts.admin')

@section('titulo', 'Producto')

@section('contenedor')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Lista de Productos</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Imagenes</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Coca Cola</td>
                            <td>Bebida</td>
                            <td>19</td>
                            <td>/img/coca.png</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">En inventario</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-outline-primary">Ver</a>
                                    <a href="" class="btn btn-outline-primary">Editar</a>
                                    <a href="" class="btn btn-outline-primary">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pepsi</td>
                            <td>Bebida</td>
                            <td>54</td>
                            <td>/img/pepsi.png</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">En inventario</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-outline-primary">Ver</a>
                                    <a href="" class="btn btn-outline-primary">Editar</a>
                                    <a href="" class="btn btn-outline-primary">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pan</td>
                            <td>Alimento</td>
                            <td>345</td>
                            <td>/img/pan.png</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">En inventario</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-outline-primary">Ver</a>
                                    <a href="" class="btn btn-outline-primary">Editar</a>
                                    <a href="" class="btn btn-outline-primary">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- ./card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer -->
        </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
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

