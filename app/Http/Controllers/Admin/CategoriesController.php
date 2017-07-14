<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('Admin.Categories.index', compact('categories'));
    }
     public function create()
    {
        return view('Admin.Categories.create');
    }
    public function edit(Category $category)
    {
        return view('Admin.Categories.edit', compact('category'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|unique:categories|max:255',
        ]);
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $category = Category::create($arr);
        return back()->with('flash', 'Se ha creado la Categoria '.  $category->name. '!!');
    }
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
        'name' => 'required|unique:categories|max:255',
        ]);
        $category->update($request->all());
        return back()->with('flash', 'Se ha actualizado la Categoria '.  $category->name. '!!');
    }
}
