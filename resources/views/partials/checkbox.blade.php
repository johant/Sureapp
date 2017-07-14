                    @foreach($question->option_answers as $answers)
                        <p style="margin:0px; padding:0px;">
                          <input type="checkbox" id="{{ $answers->id }}" name="answer[{{ $question->id }}]" value="{{ $question->id }}" />
                          <label for="{{ $answers->id  }}">{{ $answers->answers }}</label>
                        </p>
                      @endforeach
