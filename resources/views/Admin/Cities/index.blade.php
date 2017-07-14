@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Departamentos
</h1>
{{-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Tickets</li>
</ol> --}}
<div class="pull-right">
     <a href="{{ route( 'cities.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar Departamento
        </a>
</div>
@stop
@section('content')
{{-- @include('partials.statistics') --}}
  <div class="panel panel-default">
    <div class="panel-body">
      <table id="categories-table" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Zona</th>
             <th>Usuario Creación</th>
              <th>Fecha Creación</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($cities as $city)
          <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->area->name }}</td>
            <td>{{ $city->user->name }}</td>
            <td>{{ $city->created_at }}</td>
            <td style="text-align:center">
              <a class="btn btn-default" href="{{ route( 'cities.edit', $city->id )}}"><i class="fa fa-pencil"></i>Editar</a>
              <a class="btn btn-danger" href="Edit/45"><i class="fa fa-plus-square"></i>Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
<div class="row">
  {{-- @include('partials.pending') --}}
</div>
@stop
@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
{{-- <link rel="stylesheet" href="/css/style.css"> --}}
@endpush
@push('scripts')
  <!-- DataTables -->
  <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#categories-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

@endpush


