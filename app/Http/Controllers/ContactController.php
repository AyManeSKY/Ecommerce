<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $page_name = 'Contact';

        // Add any additional logic if needed

        return view('contact.index', compact('page_name'));
    }
}