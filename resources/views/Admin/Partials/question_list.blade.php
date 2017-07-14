  <div class="panel panel-default">
    <div class="panel-body">
      <table id="surveys-table" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Pregunta</th>
              <th>Tipo Pregunta</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($questions as $question)
          <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->title }}</td>
            <td>{{ $question->question_type }}</td>
            <td style="text-align:center">
              <a class="btn btn-default"
                  data-toggle="modal" data-target="#viewanswer-window" href="">
                <i class="fa fa-pencil"></i>Respuestas
                </a>
              <a class="btn btn-success" href="{{ route('survey.question', $survey->id )}}"><i class="fa fa-plus-square"></i>Adicionar</a>
              <a class="btn btn-danger" href="" data-toggle="modal" data-target="#myModalAnswer"><i class="fa fa-minus-square"></i>Eliminar</a>
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

      // $('#updatesurvey-window').on('show.bs.modal', function (event) {
      //   var button = $(event.relatedTarget) // Button that triggered the modal
      //   var title = button.data('title') // Extract info from data-* attributes
      //   var description = button.data('description') // Extract info from data-* attributes
      //   var client = button.data('client') // Extract info from data-* attributes
      //   var category = button.data('category') // Extract info from data-* attributes
      //   var id = button.data('id') // Extract info from data-* attributes

      //   var modal = $(this)
      //   modal.find('#title').val(title)
      //   modal.find('#description').val(description)
      //   modal.find('#client_id').val(client)
      //   modal.find('#category_id').val(category)

      //   var pathname = window.location.host
      //   $('#frmUpdate').attr('action', window.location.protocol + "//"+pathname+'/admin/survey/update/'+id);
      // });
    });
  </script>
{{-- @include('Admin.partials.modal_new_survey')
@include('Admin.partials.modal_update_survey') --}}


@endpush

