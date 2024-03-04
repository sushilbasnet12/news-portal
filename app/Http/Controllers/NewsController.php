<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view("layouts.news.index");
    }

    public function create()
    {
        return view("layouts.news.create");
    }
}
