@extends('layouts.admin')

@section('titulo', 'Categoria')

@section('contenedor')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h5 class="card-title">Lista de Categoria</h5>
                <a href="#" class="btn btn-success btn-sm ml-auto" data-toggle="modal" data-target="#modalAgregarCategoria">
                    <i class="fas fa-cloud-upload-alt"></i> Nueva Categoria
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>DETALLE</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $key => $cat)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $cat->nombre }}</td>
                            <td>{{ $cat->detalle }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('categoria.mostrar_productos', $cat->id) }}" class="btn btn-outline-primary">Ver Productos</a>
                                    <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalEditarCategoria{{ $cat->id }}">Editar</a>
                                    <!--===============================================
                                    =               Modal Editar Categoria            =
                                    ================================================-->
                                    <div class="modal fade" id="modalEditarCategoria{{ $cat->id }}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('categoria.update', $cat->id) }}" role="form" method="post" enctype="multipart/form-data"">
                                                    @csrf
                                                    @Method('PUT')
                                                    <div class="modal-header" style="background: #3c8dbc; color: white;"">
                                                        <h4 class="modal-title">Editar Categoria: {{ $cat->nombre }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">N</span>
                                                                    <input type="text" class="form-control input-lg" name="nombre" value="{{ $cat->nombre }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">D</span>
                                                                    <input type="text" class="form-control input-lg" name="detalle" value="{{ $cat->detalle }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">FC</span>
                                                                    <input type="text" class="form-control input-lg" name="fecha_created" value="Creado: {{ $cat->created_at }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">FM</span>
                                                                    <input type="text" class="form-control input-lg" name="fecha_updated" value="Modificado: {{ $cat->updated_at }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalEliminarCategoria{{ $cat->id }}">Eliminar</a>
                                    <!--===============================================
                                    =               Modal Eliminar Categoria          =
                                    ================================================-->
                                    <div class="modal fade" id="modalEliminarCategoria{{ $cat->id }}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('categoria.destroy', $cat->id) }}" role="form" method="post" enctype="multipart/form-data"">
                                                    @csrf
                                                    @Method('DELETE')
                                                    <div class="modal-header" style="background: #C72333; color: white;"">
                                                        <h4 class="modal-title">Eliminar Categoria: {{ $cat->nombre }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">N</span>
                                                                    <input type="text" class="form-control input-lg" name="nombreli" value="{{ $cat->nombre }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">D</span>
                                                                    <input type="text" class="form-control input-lg" name="detalleli" value="{{ $cat->detalle }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">FC</span>
                                                                    <input type="text" class="form-control input-lg" name="fecha_createdeli" value="Creado: {{ $cat->created_at }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">FM</span>
                                                                    <input type="text" class="form-control input-lg" name="fecha_updatedeli" value="Modificado: {{ $cat->updated_at }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>¿Esta Seguro de Eliminar esta Categoria?</p>
                                                        NOTA: Si elimina no podrá recuperar los datos
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--===============================================
=               Modal Agregar Categoria           =
================================================-->
<div class="modal fade" id="modalAgregarCategoria" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('categoria.store') }}" role="form" method="post" enctype="multipart/form-data"">
                @csrf
                <div class="modal-header" style="background: #3c8dbc; color: white;"">
                    <h4 class="modal-title">Agregar Nueva Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text">N</span>
                                <input type="text" name="nombre" class="form-control input-lg @error('nombre') is-invalid @enderror" placeholder="Ingresar Nombre" value="{{ old('nombre') }}" required>
                            </div>
                            @error('nombre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text">D</span>
                                <input type="text" name="detalle" class="form-control input-lg @error('detalle') is-invalid @enderror" placeholder="Ingresar Detalle" value="{{ old('detalle') }}" required>
                            </div>
                            @error('nombre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
        "buttons": []
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')
    })
</script>
@endsection

{{-- @section('js')
    @if($errors->any())
        <script>
            $('#modalAgregarCategoria').modal('show')
        </script>
    @endif
@endsection --}}
