<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories
        $categories = Category::all();

        // If a specific category is requested, get its news; otherwise, get all news
        $latestNews = $request->has('category') ?
            Category::where('category_name', $request->category)->firstOrFail()->news()->orderBy('created_at', 'desc')->get() :
            News::orderBy('created_at', 'desc')->get();

        return view('welcome', compact('latestNews', 'categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('front.category', compact('category'));
    }
}
