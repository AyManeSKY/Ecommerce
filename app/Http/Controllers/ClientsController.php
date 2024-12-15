<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function show(Client $client)
    {
        // Afficher le profil de l'utilisateur
        return view('clients.show', compact('client'));
    }

    public function index()
    {
        $page_name = 'Clients';
        $clients = Client::all();
        return view('clients.index', compact('page_name','clients'));
    }

    public function create()
    {
        $page_name = 'Clients';
        return view('clients.create',compact('page_name'));
    }

    public function store(Request $request)
    {
        // Validez et enregistrez le nouvel utilisateur
        // ...

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'numero_telephone' => 'required|string|min:10',
            'email' => 'required|string'
        ]);

        Client::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'numero_telephone' => $request->input('numero_telephone'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('clients.index')->with('success', 'Utilisateur ajouté avec succès.');
    }

    public function edit(Client $client)
    {
        $page_name = 'Clients';
        return view('clients.edit', compact('client','page_name'));
    }

    public function update(Request $request, Client $client)
    {
        // Validez et mettez à jour les informations de l'utilisateur
        // ...
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'numero_telephone' => 'required|string|min:10',
            'email' => 'required|string'
        ]);

        $client->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'numero_telephone' => $request->input('numero_telephone'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    public function destroy(Client $client)
    {
        // Supprimez l'utilisateur
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
    // Ajoutez d'autres méthodes pour gérer les opérations CRUD pour les utilisateurs
}
