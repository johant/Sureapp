                @foreach($question->option_answers as $answers)
                        <p style="margin:0px; padding:0px;">
                          <input type="radio" id="{{ $answers->id }}" name="answers[{{ $question->id }}]" value="{{ $answers->id }}" />
                          <label for="{{ $answers->id  }}">{{ $answers->answers }}</label>
                        </p>
                      @endforeach
