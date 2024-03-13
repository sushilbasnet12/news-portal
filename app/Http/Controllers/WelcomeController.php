<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->has('category') ? Category::where('category_name', $request->category)->first() : null;
        $latestNews = $category ? $category->news()->orderBy('created_at', 'desc')->get() : News::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('latestNews'));
    }
}
