<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\City;
use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cities = City::all();
        return view('Admin.Cities.index', compact('cities'));
    }
     public function create()
    {
        $areas = Area::all();
        return view('Admin.Cities.create', compact('areas'));
    }
    public function edit(City $city)
    {
        $areas = Area::all();
        return view('Admin.Cities.edit', compact('city', 'areas'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|unique:cities|max:255',
        'area_id' => 'required',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $city = City::create($arr);
        return back()->with('flash', 'Se ha creado la Ciudad '.  $city->name. '!!');
    }
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
        'name' => 'required|unique:cities|max:255',
        ]);
        $city->update($request->all());
        return back()->with('flash', 'Se ha actualizado la Ciudad '.  $city->name. '!!');
    }
}
