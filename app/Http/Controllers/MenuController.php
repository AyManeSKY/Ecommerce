<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $page_name = 'Menu';
        $pizzas = Pizza::all();

        return view('menu.index', compact('page_name', 'pizzas'));
    }
}