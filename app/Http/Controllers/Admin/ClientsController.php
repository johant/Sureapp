<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clients = Client::all();
        return view('Admin.Clients.index', compact('clients'));
    }
     public function create()
    {
        return view('Admin.Clients.create');
    }
    public function edit(Client $client)
    {
        return view('Admin.Clients.edit', compact('client'));
    }
    public function store(Request $request)
    {
         $this->validate($request,[
        'name' => 'required|max:255',
        'quantity' => 'required',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        // $arr['user_id'] = Auth::id();
        $client = Client::create($arr);
        return back()->with('flash', 'Se ha creado el Tipo de Cliente '.  $client->name. '!!');
    }
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'quantity' => 'required',
        ]);
        $client->update($request->all());
        return back()->with('flash', 'Se ha actualizado el Tipo de Cliente '.  $client->name. '!!');
    }
}
