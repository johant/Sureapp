@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Clientes
</h1>
<div class="pull-right">
     <a href="{{ route( 'customer.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar Cliente
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
              <th>Contacto</th>
              {{-- <th>Email</th> --}}
              <th>Pto Venta</th>
              <th>Tipo Cliente</th>
              <th>Trade</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $customer)
          <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->contact }}</td>
            {{-- <td>{{ $customer->email }}</td> --}}
            <td>{{ $customer->sale }}</td>
            <td>{{ $customer->client->name }}</td>
            <td>{{ $customer->trade_id}}</td>
            <td style="text-align:center">
            <span style="padding-right: 5px"><a href="{{ route( 'customer.edit', $customer->id )}}" data-toggle="tooltip" title="Editar Cliente"><i class="fa fa-fw fa-pencil text-warning fa-2x" title="Editar Cliente"></i></a></span>
            <span style="padding-right: 5px"><a href="{{ route( 'staffs.create', $customer->id )}}" data-toggle="tooltip" title="Crear Staff"><i class="fa fa-fw fa-users text-primary fa-2x" title="Crear Staff"></i></a></span>
            <a href="#" data-toggle="tooltip" title="Eliminar Cliente"><i class="fa fa-fw fa-times text-danger fa-2x" title="Eliminar Cliente"></i></a>
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

    });
  </script>

@endpush
