<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Client;
use App\Models\Order;

class ReviewController extends Controller
{
    public function create(Order $order)
    {
        // Laisser un avis sur une commande
        $page_name = 'Reviews';
        $clients = Client::all();
        $orders = Order::all();

        return view('reviews.create', compact('orders','clients','page_name'));
    }

    public function store(Request $request, Order $order)
    {
        // Valider et enregistrer l'avis
        // ...

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'order_id' => 'required|exists:orders,id',
            'note' => 'required|int',
            'commentaire' => 'required',
        ]);
        
        
        Review::create([
            'client_id' => $request->input('client_id'),
            'order_id' => $request->input('order_id'),
            'note' => $request->input('note'),
            'commentaire' => $request->input('commentaire'),
        ]);
        // Redirection vers la page de détails de la commande
        return redirect()->route('reviews.index', $order)->with('success', 'Avis enregistré avec succès.');
    }


    public function index()
    {
        $page_name = 'Reviews';
        $reviews = Review::all();
        return view('reviews.index', compact('page_name','reviews'));
    }

    public function edit(Review $review)
    {
        $page_name = 'Reviews';
        $clients = Client::all();
        $orders = Order::all();

        return view('reviews.edit', compact('review', 'clients', 'orders','page_name'));
    }

    public function update(Request $request, Review $review)
    {
        // Validez et mettez à jour l'avis
        // ...
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'order_id' => 'required|exists:orders,id',
            'note' => 'required|int',
            'commentaire' => 'required',
        ]);
        
        
        $review->update([
            'client_id' => $request->input('client_id'),
            'order_id' => $request->input('order_id'),
            'note' => $request->input('note'),
            'commentaire' => $request->input('commentaire'),
        ]);

        return redirect()->route('reviews.index')->with('success', 'Avis mis à jour avec succès.');
    }

    public function destroy(Review $review)
    {
        // Supprimez l'avis
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Avis supprimé avec succès.');
    }
    // Ajoutez d'autres méthodes pour gérer les opérations CRUD pour les avis
}
