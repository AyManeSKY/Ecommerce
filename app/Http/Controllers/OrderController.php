<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pizza;
use App\Models\Client;

class OrderController extends Controller
{
    public function create()
    {
        $page_name = 'Orders';
        // Créer une nouvelle commande
        $clients = Client::all(); // Récupérer tous les clients

        $pizzas = Pizza::all(); // Récupérer toutes les pizzas
    
        return view('orders.create', compact('clients', 'pizzas','page_name'));
    }

    public function store(Request $request)
    {
        // Valider et enregistrer la nouvelle commande
        // ...
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'pizza_id' => 'required|exists:pizzas,id',
            'etat' => 'required|in:en attente,en préparation,prête',
        ]);
        
        
        Order::create([
            'client_id' => $request->input('client_id'),
            'pizza_id' => $request->input('pizza_id'),
            'etat' => $request->input('etat'),
        ]);

        return redirect()->route('orders.index')->with('success', 'Commande passée avec succès.');
    }


    public function index()
    {
        $page_name = 'Orders';
        $orders = Order::all();
        return view('orders.index', compact('page_name','orders'));
    }

    public function edit(Order $order)
    {
        $page_name = 'Orders';
        $clients = Client::all();
        $pizzas = Pizza::all(); // Récupérer toutes les pizzas
        

        return view('orders.edit', compact('order', 'clients', 'pizzas','page_name'));
    }

    public function update(Request $request, Order $order)
    {
        // Validez et mettez à jour la commande
        // ...

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'pizza_id' => 'required|exists:pizzas,id',
            'etat' => 'required|in:en attente,en préparation,prête',
        ]);

        $order->update([
            'client_id' => $request->input('client_id'),
            'pizza_id' => $request->input('pizza_id'),
            'etat' => $request->input('etat'),
        ]);

        return redirect()->route('orders.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy(Order $order)
    {
        // Supprimez la commande
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès.');
    }
    // Ajoutez d'autres méthodes pour gérer les opérations CRUD pour les commandes
}
