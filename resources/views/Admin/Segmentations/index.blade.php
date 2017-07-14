@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Segmentaciones
</h1>
{{-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Tickets</li>
</ol> --}}
<div class="pull-right">
     <a href="{{ route( 'segmentations.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar Segmentacion
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
              <th>Descripción</th>
              <th>Tipo</th>
              <th>Usuario Creación</th>
              <th>Fecha Creación</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($segmentations as $segmentation)
          <tr>
            <td>{{ $segmentation->id }}</td>
            <td>{{ $segmentation->name }}</td>
            <td>{{ $segmentation->description }}</td>
            <td>{{ $segmentation->type }}</td>
            <td>{{ $segmentation->user->name }}</td>
            <td>{{ $segmentation->created_at }}</td>
            <td style="text-align:center">
              <a class="btn btn-default" href="{{ route( 'segmentations.edit', $segmentation->id )}}"><i class="fa fa-pencil"></i>Editar</a>
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
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

@endpush

