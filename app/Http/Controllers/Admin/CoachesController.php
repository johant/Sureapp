<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Area;
use App\Coach;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CoachesController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $coaches = Coach::all();
        // return dd($coaches);
        return view('Admin.Coaches.index', compact('coaches'));
    }
    public function create()
    {
        $areas = Area::all();
        return view('Admin.Coaches.create', compact('areas'));
    }
     public function edit(Coach $coach)
    {
        $areas = Area::all();
        return view('Admin.Coaches.edit', compact('coach', 'areas'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'area_id' => 'required',
        'email' => 'required|unique:coaches',
        'password' => 'required',
        ]);
        $arr = $request->all();
        $arr['user_id'] = Auth::id();
        $coach = Coach::create($arr);
        $user = New User();
        $user->name = $request->get('name');
        $user->username = $request->get('document');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role_id = 2;
        $user->save();

        return back()->with('flash', 'Se ha creado el entrenador '.  $coach->name. '!!');
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
