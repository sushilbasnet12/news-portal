<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;


class CategoryController extends Controller
{
    public function index(Request $request)
    {

        /*  $categories = Category::all();
        $blogs = Blog::all(); */

        if ($request->ajax()) {
            $data = Category::latest()->get(); // Fetch the latest category data

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {

                    // Using Spatie Media Library:
                    $imageUrl = $row->getFirstMediaUrl('categories');
                    return '<img src="' . $imageUrl . '" width="50" height="50">';
                })
                ->rawColumns(['image'])
                ->make(true);
        }

        // return view("layouts.category.index", compact('categories', 'blogs'));
    }

    public function create()
    {
        return view("layouts.category.create");
    }

    public function edit(Category $category)
    {
        return view("layouts.category.edit", compact('category'));
    }


    public function store(Request $request)
    {
        // Validating data 
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000',
        ]);

        // Create a new category instance
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->save();

        // Handling Image with Spatie MediaLibrary
        $category->addMediaFromRequest('image')->toMediaCollection('categories');

        return redirect()->route('categories.index');
    }


    public function update(Request $request, Category $category)
    {
        // Validate Data
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->save();

        if ($request->hasFile('image')) {
            // First, clear old images if necessary
            $category->clearMediaCollection('categories');
            // Then add new one
            $category->addMediaFromRequest('image')->toMediaCollection('categories');
        }

        return redirect()->route('categories.index');
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
