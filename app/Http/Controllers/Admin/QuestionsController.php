<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Survey;
use App\Option_answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
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
      return redirect('admin/survey/answer/correct/'. $question->id);
    }
    public function correct(Request $request, Question $question)
    {
      return view('Admin.Questions.correct', compact('question'));
   }
   public function updatecorrect(Request $request, Question $question)
   {
     $this->validate($request, [
        'correct_answer' => 'required',
        ]);

        $question->correct_answer = $request->get('correct_answer');
        $question->save();
        return back()->with('flash', 'Se ha actualizado la Respuesta!!');
   }
}
