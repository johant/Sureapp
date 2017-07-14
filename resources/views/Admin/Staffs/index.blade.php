@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Staff
</h1>
<div class="pull-right">
     <a href="{{ route( 'coaches.create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
           Adicionar Personal
        </a>
</div>
@stop
@section('content')
{{-- @include('partials.statistics') --}}

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
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
      $('#customers-pending-table').DataTable({
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
