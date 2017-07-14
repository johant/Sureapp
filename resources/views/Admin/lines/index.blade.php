@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Lineas
</h1>
{{-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Tickets</li>
</ol> --}}
<div class="pull-right">
     <a href="{{ route( 'category.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar Linea
        </a>
</div>
@stop
@section('content')
{{-- @include('partials.statistics') --}}
  <div class="panel panel-default">
    <div class="panel-body">
      <table id="lines-table" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Categoria</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse($lines as $line)
          <tr>
            <td>{{ $line->id }}</td>
            <td>{{ $line->name }}</td>
            <td>{{ $line->description }}</td>
            <td>{{ $line->category->name }}</td>
            <td style="text-align:center">
              <a class="btn btn-default" href="{{ route( 'line.edit', $category->id )}}"><i class="fa fa-pencil"></i>Editar</a>
              <a class="btn btn-danger" href="Edit/45"><i class="fa fa-plus-square"></i>Eliminar</a>
            </td>
          </tr>
          @empty
            <tr>
              <td colspan="6">No existen Registros!!</td>
            </tr>
          @endforelse
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
      $('#lines-table').DataTable({
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

