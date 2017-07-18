@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Variantes
</h1>
{{-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Tickets</li>
</ol> --}}
<div class="pull-right">
     <a href="{{ route( 'variants.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar Variante
        </a>
</div>
@stop
@section('content')
{{-- @include('partials.statistics') --}}
  <div class="box box-primary">
    <div class="box-body">
      <table id="categories-table" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Marca</th>
              <th>Segmentación</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($variants as $variant)
          <tr>
            <td>{{ $variant->id }}</td>
            <td>{{ $variant->name }}</td>
            <td>{{ $variant->description }}</td>
            <td>{{ $variant->brand->name }}</td>
            <td>{{ $variant->segmentation->name }}</td>
           <td style="text-align:center">
            <span style="padding-right: 5px"><a href="{{ route( 'variants.edit', $variant->id )}}" data-toggle="tooltip" title="Editar Variantes"><i class="fa fa-fw fa-pencil text-warning fa-2x" title="Editar Variantes"></i></a></span>
            <a href="#" data-toggle="tooltip" title="Eliminar Variantes"><i class="fa fa-fw fa-times text-danger fa-2x" title="Eliminar Variantes"></i></a>
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
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

@endpush


