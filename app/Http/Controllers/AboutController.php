<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page_name = 'About';

        // Add any additional logic if needed

        return view('about.index', compact('page_name'));
    }
}