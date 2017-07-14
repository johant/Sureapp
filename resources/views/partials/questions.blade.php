      <ul class="collapsible" data-collapsible="expandable">
          @forelse ($survey->questions as $question)
          <li style="box-shadow:none;">
            <div class="collapsible-header">{{ $question->title }} <a href="/question/{{ $question->id }}/edit" style="float:right;">Edit</a></div>
                <div class="collapsible-body">
                    <div style="margin:5px; padding:10px;">
                        <form action="">
                        @if($question->question_type === 'text')
                            <input type="text" class="" name="title" id="title">
                        @elseif($question->question_type === 'textarea')
                            @include('partials.textarea')
                        @elseif($question->question_type === 'radio')
                            @include('partials.radio')
                        @elseif($question->question_type === 'checkbox')
                            @include('partials.checkbox')
                        @endif
                        </form>
                    </div>
                </div>
          </li>
          @empty
            <span style="padding:10px;">No se han creado Preguntas!!!.</span>
          @endforelse
      </ul>
