<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;
use App\Models\Client;

class SuggestionController extends Controller
{
    public function create()
    {
        $page_name = 'Suggestions';
        $clients = Client::all();
        // Faire une suggestion
        return view('suggestions.create',compact('clients','page_name'));
    }

    public function store(Request $request)
    {
        // Valider et enregistrer la suggestion
        // ...

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'suggestion' => 'required',
        ]);
        
        
        Suggestion::create([
            'client_id' => $request->input('client_id'),
            'suggestion' => $request->input('suggestion')
        ]);

        return redirect()->route('suggestions.index')->with('success', 'Suggestion envoyée avec succès.');
    }

    public function index()
    {
        $page_name = 'Suggestions';
        $suggestions = Suggestion::all();
        return view('suggestions.index', compact('page_name','suggestions'));
    }

    public function edit(Suggestion $suggestion)
    {
        $page_name = 'Suggestions';
        $clients = Client::all();

        return view('suggestions.edit', compact('suggestion','clients','page_name'));
    }

    public function update(Request $request, Suggestion $suggestion)
    {
        // Validez et mettez à jour la suggestion
        // ...

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'suggestion' => 'required',
        ]);
        
        
        $suggestion->update([
            'client_id' => $request->input('client_id'),
            'suggestion' => $request->input('suggestion')
        ]);

        return redirect()->route('suggestions.index')->with('success', 'Suggestion mise à jour avec succès.');
    }

    public function destroy(Suggestion $suggestion)
    {
        // Supprimez la suggestion
        $suggestion->delete();

        return redirect()->route('suggestions.index')->with('success', 'Suggestion supprimée avec succès.');
    }

    // Ajoutez d'autres méthodes pour gérer les opérations CRUD pour les suggestions
}
