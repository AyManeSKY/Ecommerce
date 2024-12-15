<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzeriaController extends Controller
{
    public function index()
    {
        $page_name = 'Accueil';

        return view('pizzeria.index', compact('page_name'));
    }
}
