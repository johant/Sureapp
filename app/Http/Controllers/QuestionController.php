<?php

namespace App\Http\Controllers;
use Auth;
use App\Survey;
use App\Question;
use App\Option_answer;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Survey $survey)
    {
      $arr = $request->all();
      // return dd($survey);
      $arr['user_id'] = Auth::id();
      $arr['survey_id'] = $survey->id;
      $question = Question::create($arr) ;
 // $survey->questions()->create($arr);
      foreach ($request->get('answers') as $answers) {
        $answer = new Option_answer();
        $answer->survey_id = $survey->id;
        $answer->question_id = $question->id;
        $answer->answers = $answers;
        $answer->save();
      }
      return back();
    }

    public function edit(Question $question)
    {
      return view('question.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
      $question->update($request->all());
      return redirect()->action('SurveyController@detail_survey', [$question->survey_id]);
    }
}
