<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Survey;
use App\Client;
use App\Question;
use App\Category;
use App\Customer;
use App\Survey_start;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveysController extends Controller
{
    public function index()
      {
        $surveys = Survey::get();
        $client_types = Client::all();
        $categories = Category::all();
        return view('Admin.Surveys.index', compact('surveys', 'client_types', 'categories'));
      }
        public function options(Survey $survey)
      {
        $questions = Question::where('survey_id', $survey->id)->get();
        return view('Admin.Questions.create', compact('survey', 'questions'));
      }
    public function create(Request $request)
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
        $survey = Survey::create($arr);
        return redirect('/admin/survey/questions/'.$survey ->id)->with('flash', 'Se ha creado la encuesta con Exito!!');
      }
      public function answer(Request $request)
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
        $survey = Survey::create($arr);
        return redirect('/admin/survey/questions/'.$survey ->id)->with('flash', 'Se ha creado la encuesta con Exito!!');
      }
      public function update(Request $request, Survey $survey)
      {
            $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'client_id' => 'required',
            'category_id' => 'required',
        ]);
          $survey->title = $request->get('title');
          $survey->description = $request->get('description');
          $survey->category_id = $request->get('category_id');
          $survey->client_id = $request->get('client_id');
          $survey->save();
          return redirect('/admin/surveys')->with('flash', 'Se ha actualizado la encuesta con Exito!!');
      }
      public function survey_start(Request $request, Customer $customer)
      {
            $this->validate($request, [
            'category_id' => 'required',
          ]);
        $survey = Survey::where('category_id', $request->get('category_id'))
                                  ->where('client_id', $customer->client_id)->first();
                                  // return dd($customer);
          $survey_start = new Survey_start;
          $survey_start->survey_id = $survey->id;
          $survey_start->customer_id = $customer->id;
          $survey_start->status = 1;
          $survey_start->user_id = Auth::id();
          $survey_start->save();
          return back()->with('flash', 'Se ha generado la encuesta al Staff de ' .$customer->name .'-' . $customer->sale .'!!');
      }
}
