<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;


class ServicesController extends Controller
{
    public function index()
    {
        $page_name = 'Services';
        $pizzas = Pizza::all();

        return view('services.index', compact('page_name','pizzas'));
    }
}