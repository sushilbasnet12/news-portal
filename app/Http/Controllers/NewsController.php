<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view("layouts.news.index", ['news' => $news]);
    }

    public function create()
    {
        $categories = Category::all();
        $news = new News(); // Create a new instance of the News model
        return view("layouts.news.create", compact('categories', 'news'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000',
            'category_id' => 'required',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->category_id = $request->category_id; // Store the selected category_id
        $news->save();

        // Handling Image with Spatie MediaLibrary
        $news->addMediaFromRequest('image')->toMediaCollection('news');

        return redirect()->route('news.index');
    }


    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('layouts.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        //Validate Data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();

        if ($request->hasFile('image')) {
            $news->clearMediaCollection('news');
            $news->addMediaFromRequest('image')->toMediaCollection('news');
        }

        return redirect()->route('news.index'); //Flash Message        
    }
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return back()->with('success', 'News Deleted !!!');
    }
}
