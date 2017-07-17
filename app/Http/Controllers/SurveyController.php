<?php

namespace App\Http\Controllers;
use Auth;
use App\Survey;
use App\Answer;
use App\Customer;
use App\Staff;
use App\Survey_start;
use App\Category;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SurveyController extends Controller
{
     public function __construct()
  {
    $this->middleware('auth');
  }
    public function home(Request $request)
      {
        $staff = Staff::where('user_id', Auth::id())->first();
        // Falta validar que la encuesta no haya sido contestada
        $survey_note = Survey_note::where('survey_id', 1)
                              ->where('staff_id', $staff->id)->get();

        $survey_starts = Survey_start::where('customer_id', $staff->customer_id)
                                ->where('status', 1)
                                ->where()
                                ->get();
        $customer = Customer::find($staff->customer_id);
        // $surveys = Survey::get();

        return view('home', compact('survey_starts', 'customer'));
      }
      # Show page to create new survey
  public function new_survey()
  {
    $client_types = Client::all();
    $categories = Category::all();
    return view('survey.new', compact('client_types', 'categories'));
  }

  public function create(Request $request, Survey $survey)
  {
    $this->validate($request, [
        'title' => 'required|max:255',
        'description' => 'required',
        'client_id' => 'required',
        'category_id' => 'required',
    ]);
    $arr = $request->all();
    // $request->all()['user_id'] = Auth::id();
    $arr['user_id'] = Auth::id();
    $surveyItem = $survey->create($arr);
    return Redirect::to("/survey/{$surveyItem->id}");
  }

  # retrieve detail page and add questions here
  public function detail_survey(Survey $survey)
  {
    $survey->load('questions.option_answers');
    // return dd($survey);
    return view('survey.detail', compact('survey'));
  }


  public function edit(Survey $survey)
  {
    return view('survey.edit', compact('survey'));
  }

  # edit survey
  public function update(Request $request, Survey $survey)
  {
    $survey->update($request->only(['title', 'description']));
    return redirect()->action('SurveyController@detail_survey', [$survey->id]);
  }

  # view survey publicly and complete survey
  public function view_survey(Survey $survey)
  {
    $survey->load('questions.option_answers');
    return view('evaluations.view', compact('survey'));
  }

  # view submitted answers from current logged in user
  public function view_survey_answers(Survey $survey)
  {
    $survey->load('user.questions.answers');
    return view('answer.view', compact('survey'));
  }
  public function delete_survey(Survey $survey)
  {
    $survey->delete();
    return redirect('');
  }
}
