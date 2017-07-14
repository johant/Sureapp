 <div class="box box-danger">
    <div class="box-header">
        <h3>{{ $question->title}}</h3>
    </div>
    <div class="box-body">
        <ul class="list">
        @foreach($question->option_answers as $answers)
        <li>
            <input type="radio" id="{{ $answers->id }}" name="correct_answer" value="{{ $answers->id }}" />
            <label for="{{ $answers->id  }}">{{ $answers->answers }}</label>
            </li>
        @endforeach
        </ul>
    </div>
</div>
