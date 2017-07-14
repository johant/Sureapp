{{--   <div class="panel panel-default">
    <div class="panel-body"> --}}
      <table id="customers-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Notas</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($staffs as $staff)
          <tr>
            <td>{{ $staff->name }}</td>
            <td>{{ $staff->email}}</td>
            <td style="text-align:center">
            @if($staff->status)
            <i class="fa fa-check true-icon"></i>
            @else
            <i class="fa fa-close false-icon"></i>
            @endif
            </td>
            <td>
            @foreach($staff->staff_note as $note)
              {{$note->survey->title }}: <strong>{{$note->note}}</strong>
            @endforeach

            </td>
            <td style="text-align:center">
              <a class="btn btn-default" href="{{ route( 'staffs.edit', $staff->id )}}"><i class="fa fa-pencil"></i>Editar</a>
              <a class="btn btn-danger" href="Edit/45"><i class="fa fa-minus-square"></i>Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
{{--     </div>
  </div> --}}
