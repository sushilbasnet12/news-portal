<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("layouts.category.index", compact('categories'));
    }

    public function create()
    {
        return view("layouts.category.create");
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('layouts.category.edit', compact('category'));
    }


    public function store(Request $request)
    {
        //Validating data 
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000',
        ]);


        //data stored.
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->save();

        // Handling Image with Spatie MediaLibrary
        $category->addMediaFromRequest('image')->toMediaCollection('categories');

        return redirect()->route('category.index'); //flash message

    }

    public function update(Request $request, $id)
    {
        //Validate Data
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->save();

        if ($request->hasFile('image')) {
            // First, clear old images if necessary
            $category->clearMediaCollection('categories');
            // Then add new one
            $category->addMediaFromRequest('image')->toMediaCollection('categories');
        }

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        // Delete associated media files
        $category->getMedia('categories')->each(function ($media) {
            $media->delete();
        });

        // Delete associated news records
        $category->news()->delete();

        // Delete the category
        $category->delete();

        return back()->with('success', 'Category Deleted !!!');
    }
}
