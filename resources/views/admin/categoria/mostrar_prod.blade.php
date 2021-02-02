@extends('layouts.admin')

@section('title', 'Productos')

@section('contenedor')
{{ $categoria->productos }}
@endsection
