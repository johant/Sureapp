@extends('layout.master')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> {{ $survey->title }}</span>
      <p>
        {{ $survey->description }}
      </p>
      <br/>
      {{-- <a href='view/{{$survey->id}}'>Take Survey</a> | <a href="{{$survey->id}}/edit">Edit Survey</a> | <a href="/survey/answers/{{$survey->id}}">View Answers</a> <a href="#doDelete" style="float:right;" class="modal-trigger red-text">Delete Survey</a> --}}
      <!-- Modal Structure -->
      <!-- TODO Fix the Delete aspect -->
      <div id="doDelete" class="modal bottom-sheet">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <h4>Are you sure?</h4>
              <p>Do you wish to delete this survey called "{{ $survey->title }}"?</p>
              <div class="modal-footer">
                <a href="/survey/{{ $survey->id }}/delete" class=" modal-action waves-effect waves-light btn-flat red-text">Yep yep!</a>
                <a class=" modal-action modal-close waves-effect waves-light green white-text btn">No, stop!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">Preguntas</p>
            @include('partials.questions')
      <h2 class="flow-text">Adicionar Pregunta</h2>
      <form method="POST" action="{{ $survey->id }}/questions" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <select class="browser-default" name="question_type" id="question_type">
              <option value="" disabled selected>Seleccione Tipo Pregunta</option>
{{--               <option value="text">Text</option>
              <option value="textarea">Textarea</option> --}}
              <option value="checkbox">Seleccion Multiple</option>
              <option value="radio">Seleccion Unica</option>
            </select>
          </div>
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Pregunta</label>
          </div>
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Grabar</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop
