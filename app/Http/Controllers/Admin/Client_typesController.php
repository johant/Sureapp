<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Client_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Client_typesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $client_types = Client_type::all();
        return view('Admin.Client_types.index', compact('client_types'));
    }
     public function create()
    {
        return view('Admin.Client_types.create');
    }
    public function edit(Client_type $client_type)
    {
        return view('Admin.Client_types.edit', compact('client_type'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|max:255',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        // $arr['user_id'] = Auth::id();
        $client_type = Client_type::create($arr);
        return back()->with('flash', 'Se ha creado el Tipo de Cliente '.  $client_type->name. '!!');
    }
    public function update(Request $request, Client_type $client_type)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        ]);
        $client_type->update($request->all());
        return back()->with('flash', 'Se ha actualizado el Tipo de Cliente '.  $client_type->name. '!!');
    }
}
