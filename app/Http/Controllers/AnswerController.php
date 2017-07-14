<?php

namespace App\Http\Controllers;

use Auth;
use App\Question;
use App\Staff_note;
use App\Staff;
use Validator;
use Illuminate\Http\Request;
use App\Survey;
use App\Answer;
use App\Http\Requests;

class AnswerController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Request $request, Survey $survey)
  {
    // remove the token
    $arr = $request->except('_token');
    $validator = Validator::make($request->all(), [
    'answers.*' => 'unique',
  ]);
    $count=0;
    // return dd($request->get('answers') );
    foreach ($request->get('answers')  as $key => $value) {
      $newAnswer = new Answer();
      $newAnswer->answer = $value;
      $newAnswer->question_id = $key;
      $newAnswer->user_id = Auth::id();
      $newAnswer->survey_id = $survey->id;
     $newAnswer->save();
     $question = Question::find($key);
     if($question->correct_answer == $value)
        $count = $count +1;
      };
      $staff = Staff::where('user_id', Auth::id())->first();
      $newNote= new Staff_note();
      $newNote->staff_id = $staff->id;
      $newNote->survey_id = $survey->id;
      $newNote->note = $count;
      $newNote->save();

    return view('evaluations.completed', compact('count'));
    // return dd($cont);
    // return redirect()->action('SurveyController@view_survey_answers', [$survey->id]);
  }
}
