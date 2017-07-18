<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Carbon\Carbon;
use App\Customer;
use App\Category;
use App\Client;
use App\Variant;
use App\Area;
use App\City;
use App\Staff;
use App\Coach;
Use App\Schedule;
use App\Segmentation;
use App\Followup_option;
use App\Survey_start;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->role_id == 2){
            $coach = Coach::where('user_coach',auth()->user()->id )->first();
            $customers = Customer::where('coach_id', $coach->id)->get();
        }
        elseif (auth()->user()->role_id == 1) {
            $customers = Customer::all();
        }
        return view('Admin.Customers.index', compact('customers'));
    }
    public function create()
    {
        $client_types = Client::all();
        $variants = Variant::all();
        $areas = Area::all();
        $cities = City::all();
        $segmentations = Segmentation::where('type', 'Clientes')->get();
        return view('Admin.Customers.create', compact('client_types', 'variants', 'areas', 'cities  ', 'segmentations'));
    }
    public function edit(Customer $customer)
    {
        $client_types = Client::all();
        $variants = Variant::all();
        $areas = Area::all();
        $cities = City::all();
        $categories = Category::all();
        $followup_options = Followup_option::all();
        $segmentations = Segmentation::where('type', 'Clientes')->get();
        $staffs= Staff::where('customer_id',  $customer->id)->get();
        $coaches= Coach::where('area_id',  $customer->area_id)->get();
        $schedules = Schedule::where('customer_id', $customer->id)->get();
        $survey_starts = Survey_start::where('customer_id', $customer->id)->get();
        $today = Carbon::today();
        return view('Admin.Customers.edit', compact('customer', 'survey_starts', 'coaches','categories','client_types', 'variants', 'areas', 'cities', 'segmentations', 'staffs', 'followup_options', 'schedules', 'today'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'address' => 'required',
        'contact' => 'required',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $customer = Customer::create($arr);
        $customer->variants()->attach($request->get('variants'));
        return back()->with('flash', 'Se ha creado el cliente '.  $customer->name. '!!');
    }
        public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'address' => 'required',
        'contact' => 'required',
        ]);
        $customer->update($request->all());
        return back()->with('flash', 'Se ha actualizado la Categoria '.  $customer->name. '!!');
    }
    public function dropdown()
    {
       $cat_id = Input::get('cat_id');
       // $city = Area::find($cat_id );
       $coaches = Coach::where('area_id', '=', $cat_id)
                      ->get();
       return Response::json($coaches);
    }
    public function copy(Request $request, Customer $customer)
    {
        $newCustomer = $customer->replicate();
        $newCustomer->save();
        $newCustomer->sale = $request->get('CopyCustomerName');
        $newCustomer->address = $request->get('CopyCustomerAddress');
        $newCustomer->save();
        return redirect('admin/customer/create')->with('flash', 'Se ha creado el cliente '.  $newCustomer->sale. '!!');
    }
    public function dashboard()
    {
        if (auth()->user()->role_id == 2){
            $coach = Coach::where('user_coach',auth()->user()->id )->first();
            $customers = Customer::where('coach_id', $coach->id)->get();
        }
        elseif (auth()->user()->role_id == 1) {
            $customers = Customer::all();
        }
        return view('Admin/dashboard', compact('customers'));
    }
}
