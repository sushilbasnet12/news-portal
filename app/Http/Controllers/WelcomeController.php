<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestNews = News::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('latestNews'));
    }
}
