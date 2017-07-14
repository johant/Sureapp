<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Segmentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SegmentationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $segmentations = Segmentation::all();
        return view('Admin.Segmentations.index', compact('segmentations'));
    }
     public function create()
    {
        return view('Admin.Segmentations.create');
    }
    public function edit(Segmentation $segmentation)
    {
        return view('Admin.Segmentations.edit', compact('segmentation'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|unique:segmentations|max:255',
        'type' =>'required'
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $segmentation = Segmentation::create($arr);
        return back()->with('flash', 'Se ha creado la Segmentación '.  $segmentation->name. '!!');
    }
    public function update(Request $request, Segmentation $segmentation)
    {
        $this->validate($request, [
        'name' => 'required|unique:segmentations|max:255',
        'type' =>'required',
        ]);
        $segmentation->update($request->all());
        return back()->with('flash', 'Se ha actualizado la Segmentación '.  $segmentation->name. '!!');
    }
}
