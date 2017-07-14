@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Encuestas
</h1>
<div class="pull-right">
     <a href="" class="btn bg-blue" data-toggle="modal" data-target="#createsurvey-window" >
            <i class="fa fa-plus-square"></i>
           Adicionar  Encuesta
        </a>
</div>
@stop
@section('content')
{{-- @include('partials.statistics') --}}
  <div class="panel panel-default">
    <div class="panel-body">
      <table id="surveys-table" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Titulo</th>
              <th>Descripción</th>
              <th>Battleground</th>
              <th>Categoria</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($surveys as $survey)
          <tr>
            <td>{{ $survey->id }}</td>
            <td>{{ $survey->title }}</td>
            <td>{{ $survey->description }}</td>
            <td>{{ $survey->client->name }}</td>
            <td>{{ $survey->category->name  }}</td>
            <td style="text-align:center">
              <a class="btn btn-default"  data-title="{{ $survey->title }}"  data-description="{{ $survey->description }}"
                  data-client="{{ $survey->client_id }}" data-category="{{ $survey->category_id }}" data-id="{{ $survey->id }}"
                  data-toggle="modal" data-target="#updatesurvey-window" href="">
                <i class="fa fa-pencil"></i>Editar
                </a>
              <a class="btn btn-success" href="{{ route('survey.question', $survey->id )}}"><i class="fa fa-plus-square"></i>Rtas</a>
              <a class="btn btn-danger" href="" data-toggle="modal" data-target="#myModalAnswer"><i class="fa fa-plus-square"></i>Eliminar</a>
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
      $('#surveys-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });

      $('#updatesurvey-window').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var title = button.data('title') // Extract info from data-* attributes
        var description = button.data('description') // Extract info from data-* attributes
        var client = button.data('client') // Extract info from data-* attributes
        var category = button.data('category') // Extract info from data-* attributes
        var id = button.data('id') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('#title').val(title)
        modal.find('#description').val(description)
        modal.find('#client_id').val(client)
        modal.find('#category_id').val(category)

        var pathname = window.location.host
        $('#frmUpdate').attr('action', window.location.protocol + "//"+pathname+'/admin/survey/update/'+id);
      });
    });
  </script>
@include('Admin.partials.modal_new_survey')
@include('Admin.partials.modal_update_survey')


@endpush

