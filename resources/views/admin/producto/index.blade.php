@extends('layouts.admin')

@section('titulo', 'Producto')

@section('contenedor')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h5 class="card-title">Lista de Productos</h5>
                <a href="#" class="btn btn-success btn-sm ml-auto" data-toggle="modal" data-target="#modalAgregarProducto">
                    <i class="fas fa-cloud-upload-alt"></i> Nuevo Producto
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUB-TOTAL</th>
                            <th>IMAGEN</th>
                            <th>CATEGORIA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $key => $prod)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $prod->nombre }}</td>
                                <td>{{ $prod->precio }}</td>
                                <td>{{ $prod->cantidad }}</td>
                                <td>{{ $prod->precio * $prod->cantidad }}</td>
                                <td>IMAGEN</td>
                                <td>{{ $prod->categoria->nombre }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalVerProd{{ $prod->id }}">Ver</a>
                                        <!--===============================================
                                        =                 Modal Ver Categoria             =
                                        ================================================-->
                                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalEditarProd{{ $prod->id }}">Editar</a>
                                        <!--===============================================
                                        =               Modal Editar Categoria            =
                                        ================================================-->
                                        <div class="modal fade" id="modalEditarProd{{ $prod->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('producto.update', $prod->id) }}" role="form" method="post" enctype="multipart/form-data"">
                                                        @csrf
                                                        @Method('PUT')
                                                        <div class="modal-header" style="background: #3c8dbc; color: white;"">
                                                            <h5 class="modal-title">Editar Producto: {{ $prod->nombre }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-sm">N</span>
                                                                        </div>
                                                                        <input type="text" name="nombre" class="form-control input-lg" value="{{ $prod->nombre }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-sm">P</span>
                                                                        </div>
                                                                        <input type="text" name="precio" class="form-control input-lg" value="{{ $prod->precio }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-sm">C</span>
                                                                        </div>
                                                                        <input type="text" name="cantidad" class="form-control input-lg" value="{{ $prod->cantidad }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <select name="categoria_id" id="" class="form-control">
                                                                            <option value="{{ $prod->categoria->id }}">{{ $prod->categoria->nombre }}</option>
                                                                            @foreach($categorias as $cat)
                                                                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <select name="estado" id="" class="form-control">
                                                                            @if($prod->estado == '1')
                                                                                <option value="1">Activo</option>
                                                                                <option value="0">Inactivo</option>
                                                                            @else
                                                                                <option value="0">Inactivo</option>
                                                                                <option value="1">Activo</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <textarea name="descripcion" class="form-control" >{{ $prod->descripcion }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm"">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroupFileAddon01">Subir Imagen</span>
                                                                        </div>
                                                                         <div class="custom-file">
                                                                            <input type="file" class="custom-file-input imagen" accept="image/jpeg, image/png" name="imagen" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                                            <label class="custom-file-label" for="inputGroupFile01">Selecciona una Imagen...</label>
                                                                        </div>
                                                                    </div>
                                                                    <p class="help-block">Peso máximo de la foto 2 MB</p>
                                                                    <img src="" class="img-thumbnail ver" width="100px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalEliminarCategoria{{ $prod->id }}">Eliminar</a>
                                        <!--===============================================
                                        =              Modal Eliminar Categoria           =
                                        ================================================-->
                                        <div class="modal fade" id="modalEliminarCategoria{{ $prod->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('categoria.destroy', $prod->id) }}" role="form" method="post" enctype="multipart/form-data"">
                                                        @csrf
                                                        @Method('DELETE')
                                                        <div class="modal-header" style="background: #C72333; color: white;"">
                                                            <h5 class="modal-title">Eliminar Categoria: {{ $prod->nombre }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-sm">N</span>
                                                                        </div>
                                                                        <input type="text" class="form-control input-lg" name="nombreli" value="{{ $prod->nombre }}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <textarea name="descripcioneli" class="form-control" disabled>{{ $prod->descripcion }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-sm">FC</span>
                                                                        </div>
                                                                        <input type="text" class="form-control input-lg" name="fecha_createdeli" value="Creado: {{ $prod->created_at }}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroup-sizing-sm">FM</span>
                                                                        </div>
                                                                        <input type="text" class="form-control input-lg" name="fecha_updatedeli" value="Modificado: {{ $prod->updated_at }}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>¿Esta Seguro de Eliminar éste Producto?</p>
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
=               Modal Agregar Producto            =
================================================-->

<div class="modal fade" id="modalAgregarProducto" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('producto.store') }}" role="form" method="post" enctype="multipart/form-data"">
                @csrf
                <div class="modal-header" style="background: #3c8dbc; color: white;"">
                    <h5 class="modal-title">Agregar Nuevo Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">N</span>
                                </div>
                                <input type="text" name="nombre" class="form-control input-lg" value="{{ old('nombre') }}" placeholder="Ingrese Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">P</span>
                                </div>
                                <input type="text" name="precio" class="form-control input-lg" value="{{ old('precio') }}" placeholder="Ingrese Precio">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">C</span>
                                </div>
                                <input type="text" name="cantidad" class="form-control input-lg" value="{{ old('cantidad') }}" placeholder="Ingrese Cantidad">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <select name="categoria_id" id="" class="form-control form-control-sm">
                                    <option value="">Selecciona Categoria ...</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <select name="estado" id="" class="form-control form-control-sm">
                                    <option value="">Selecciona Estado ...</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <textarea name="descripcion" class="form-control" placeholder="Ingrese Descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-sm"">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Subir Imagen</span>
                                </div>
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input imagen" accept="image/jpeg, image/png" name="imagen" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Selecciona una Imagen...</label>
                                </div>
                            </div>
                            <p class="help-block">Peso máximo de la foto 2 MB</p>
                            <img src="" class="img-thumbnail ver" width="100px">
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

