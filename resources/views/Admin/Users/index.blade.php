@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
Usuarios
</h1>
{{-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Tickets</li>
</ol> --}}
<div class="pull-right">
     <a href="{{ route( 'users.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar  Usuario
        </a>
</div>
@stop
@section('content')
{{-- @include('partials.statistics') --}}
  <div class="box box-primary">
    <div class="box-body">
    <div class="dataTables_wrapper form-inline dt-bootstrap">
      <table id="categories-table" class="table table-bordered table-hover dataTable nowrap">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Email</th>
              <th>Perfil</th>
              <th style="text-align:center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td style="text-align:center">
            {{-- {{ route('admin.users.edit', $user->id) }} --}}

            <span style="padding-right: 5px"><a href="#" data-toggle="tooltip" title="Editar Usuario"><i class="fa fa-fw fa-pencil text-warning fa-2x" title="Editar"></i></a></span>
            <span style="padding-right: 5px"><a href="#" data-toggle="tooltip" title="Cambiar Password"><i class="fa fa-fw fa-unlock text-success fa-2x" title="Cambiar Password"></i></a></span>
            <a href="#" data-toggle="tooltip" title="Eliminar Usuario"><i class="fa fa-fw fa-times text-danger fa-2x" title="Eliminar"></i></a>
           </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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
  <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>

  <script>
    $(function () {
      $('#categories-table').DataTable({
        "responsive": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

@endpush

