<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;

class BlogController extends Controller
{
    public function index()
    {

        return view('home', compact('home'));
    }

    public function getBlog(Request $request)
    {
        // Check if the request is an AJAX request
        if ($request->ajax()) {
            // Fetch the latest blog data from the database
            $data = Blog::latest()->get();

            // Process the data using DataTables and add an index column
            $dataTable = DataTables::of($data)->addIndexColumn();

            // Return the processed DataTables response
            return $dataTable->make(true);
        }
    }
}
