<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $brands = Brand::all();
        return view('Admin.Brands.index', compact('brands'));
    }
     public function create()
    {
        return view('Admin.Brands.create');
    }
    public function edit(Brand $brand)
    {
        return view('Admin.Brands.edit', compact('brand'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|unique:brands|max:255',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $Brand = Brand::create($arr);
        return back()->with('flash', 'Se ha creado la Marca '.  $Brand->name. '!!');
    }
    public function update(Request $request, Brand $Brand)
    {
        $this->validate($request, [
        'name' => 'required|unique:brands|max:255',
        ]);
        $Brand->update($request->all());
        return back()->with('flash', 'Se ha actualizado la Marca '.  $Brand->name. '!!');
    }
}
