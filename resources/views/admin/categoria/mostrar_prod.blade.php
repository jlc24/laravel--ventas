@extends('layouts.admin')

@section('titulo', 'Categoria')

@section('contenedor')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title">{{ $categoria->nombre }}</h3>
                <a href="{{ route('categoria.index') }}" class="btn btn-primary btn-sm ml-auto">
                    <i class="far fa-arrow-alt-circle-left"></i> Regresar a Categorias
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="productos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>ESTADO</th>
                            <th>IMAGEN</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categoria->productos as $key => $prod)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $prod->nombre }}</td>
                                <td>{{ $prod->precio }}</td>
                                <td>{{ $prod->cantidad }}</td>
                                <td>
                                    @if($prod->estado == '1')
                                        <a href="#" class="btn btn-success btn-sm">Activo</a>
                                    @else
                                        <a href="#" class="btn btn-danger btn-sm">Inactivo</a>
                                    @endif
                                </td>
                                <td>IMAGEN</td>
                                <td>{{ $prod->descripcion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Page specific script -->
<script>
    $(function () {
      $("#productos").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#productos_wrapper .col-md-6:eq(0)')
    })
</script>
@endsection
