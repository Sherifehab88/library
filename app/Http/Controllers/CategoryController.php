<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        // dd($hh);
        return view('categories.index',compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show',compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            
        ]);
        
        Category::create([
            'name' => $request->name,
            
        ]);

        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit',compact('category'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            
        ]); 

        $category = Category::findOrFail($id);
        
        $category->update([
            'name'=>$request->name,
            
        ]);
        return redirect(route('categories.show',$id));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back();
    }
}
