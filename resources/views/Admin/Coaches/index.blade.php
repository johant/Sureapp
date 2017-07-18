@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Entrenadores
</h1>
<div class="pull-right">
     <a href="{{ route( 'coaches.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar Entrenador
        </a>
</div>
@stop
@section('content')
{{-- @include('partials.statistics') --}}
  <div class="box box-primary">
    <div class="box-body">
      <table id="customers-table" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Documento</th>
              <th>Email</th>
              <th>Zona</th>
              <th>Estado</th>
              <th style="text-align:center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($coaches as $coach)
          <tr>
            <td>{{ $coach->name }}</td>
            <td>{{ $coach->document }}</td>
            <td>{{ $coach->email}}</td>
            <td>{{ $coach->area->name }}</td>
            <td style="text-align:center">
            @if($coach->status)
            <i class="fa fa-check true-icon"></i>
            @else
            <i class="fa fa-close false-icon"></i>
            @endif
            </td>
            <td style="text-align:center">
            <span style="padding-right: 5px"><a href="{{ route( 'coaches.edit', $coach->id )}}" data-toggle="tooltip" title="Editar Entrenador"><i class="fa fa-fw fa-pencil text-warning fa-2x" title="Editar Entrenador"></i></a></span>
            <a href="#" data-toggle="tooltip" title="Eliminar Entrenador"><i class="fa fa-fw fa-times text-danger fa-2x" title="Eliminar Entrenador"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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
      $('#customers-table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
      $('#customers-pending-table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

@endpush
