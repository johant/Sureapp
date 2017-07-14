<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreasController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $areas = Area::all();
        return view('Admin.Areas.index', compact('areas'));
    }
     public function create()
    {
        return view('Admin.Areas.create');
    }
    public function edit(Area $area)
    {
        return view('Admin.Areas.edit', compact('area'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|unique:areas|max:255',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $areas = Area::create($arr);
        return back()->with('flash', 'Se ha creado la Zona '.  $areas->name. '!!');
    }
    public function update(Request $request, Area $area)
    {
        $this->validate($request, [
        'name' => 'required|unique:areas|max:255',
        ]);
        $area->update($request->all());
        return back()->with('flash', 'Se ha actualizado la Zona '.  $area->name. '!!');
    }
}
