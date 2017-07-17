<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Area;
use App\Coach;
use App\Staff;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StaffsController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Customer $customer)
    {
        $coaches = Coach::all();
        // return dd($coaches);
        return view('Admin.Coaches.index', compact('coaches'));
    }
    public function create(Customer $customer)
    {
        return view('Admin.Staffs.create', compact( 'customer' ));
    }
     public function edit(Staff $staff)
    {
        $areas = Area::all();
        return view('Admin.Coaches.edit', compact('coach', 'areas'));
    }
    public function store(Request $request, Customer $customer)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'document' => 'required|unique:staff|max:10'
        ]);
         $user = New User();
        $user->name = $request->get('name');
        $user->username = $request->get('document');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('document'));
        $user->role_id = 3;
        $user->save();
        $arr = $request->all();
        $arr['user_id'] =  $user->id;
        $arr['customer_id'] = $customer->id;
        $staff = Staff::create($arr);

        return back()->with('flash', 'Se ha creado el Staff '.  $staff->name. '!!');
    }

   public function update(Request $request, Coach $coach)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'area_id' => 'required',
        'email' => 'required',
        ]);
        $coach->update($request->all());

        $user = User::where('username', $coach->document)
                    ->update(['name' => $request->get('name')],
                                    ['username' => $request->get('username')],
                                    ['email' => $request->get('email')]);

        // $user->name = $request->get('name');
        // $user->username = $request->get('document');
        // $user->email = $request->get('email');
        // $user->save();

        return back()->with('flash', 'Se ha actualizado el entrenador '.  $coach->name. '!!');
    }
}
