<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        return view("layouts.news.index",  ["news" => News::with('category')->get()]);
    }

    public function create()
    {
        return view("layouts.news.create", [
            "categories" => Category::all(),
        ]);
    }
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
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
        $categories = Category::all();
        return view('layouts.news.edit', compact('news', 'categories'));
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

    public function search(Request $request)
    {
        // Get the keyword from the request
        $keyword = $request->input('keyword');

        // Search for news where the title contains the keyword
        $news = News::where('title', 'like', '%' . $keyword . '%')->get();

        // Return the search results along with the keyword to the view
        return view('layouts.news.search', compact('news', 'keyword'));
    }
}
