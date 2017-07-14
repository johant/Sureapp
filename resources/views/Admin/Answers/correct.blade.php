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
      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">Preguntas</p>
        <ul class="expandable" >
          @forelse ($survey->questions as $question)
          <li style="box-shadow:none;">
            <div class="collapsible-header">{{ $question->title }} <a href="/question/{{ $question->id }}/edit" style="float:right;">Edit</a></div>
                <div class="collapsible-body">
                    <div style="margin:5px; padding:10px;">
                        <form action="">
                        @elseif($question->question_type === 'radio')
                            @include('partials.radio')
                        @elseif($question->question_type === 'checkbox')
                            @include('partials.checkbox')
                        @endif
                          <div class="input-field col s12">
                            <button class="btn waves-effect waves-light">Grabar</button>
                          </div>
                        </form>
                    </div>
                </div>
          </li>
          @empty
            <span style="padding:10px;">No se han creado Preguntas!!!.</span>
          @endforelse
      </ul>
    </div>
  </div>
@stop
