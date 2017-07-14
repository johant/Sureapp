<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Variant;
use App\Brand;
use App\Segmentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VariantsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $variants = Variant::all();
        return view('Admin.Variants.index', compact('variants'));
    }
     public function create()
    {
        $brands = Brand::all();
        $segmentations = Segmentation::where('type', 'Licores')->get();
        return view('Admin.Variants.create', compact('brands', 'segmentations'));
    }
    public function edit(Variant $variant)
    {
        $brands = Brand::all();
        $segmentations = Segmentation::where('type', 'Licores')->get();
        return view('Admin.Variants.edit', compact('variant', 'brands', 'segmentations'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|max:255',
        'brand_id' => 'required|max:255',
        'segmentation_id' => 'required|max:255',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $variant = Variant::create($arr);
        return back()->with('flash', 'Se ha creado la Variante '.  $variant->name. '!!');
    }
    public function update(Request $request, Variant $variant)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'brand_id' => 'required|max:255',
        'segmentation_id' => 'required|max:255',
        ]);
        $variant->update($request->all());
        return back()->with('flash', 'Se ha actualizado la Variante '.  $variant->name. '!!');
    }
}
