<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $page_name = 'Blog';

        // You can add logic here to fetch blog posts from the database, if needed

        return view('blog.index', compact('page_name'));
    }
}