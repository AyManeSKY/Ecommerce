<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        $page_name = 'Résérvation';

    // Retrieve cart items from the session
    $cartItems = session('cart', []);

    // Calculate total price
    $totalPrice = 0;
    foreach ($cartItems as $pizza) {
        $totalPrice += $pizza['prix'];
    }

    return view('reservations.create', compact('page_name', 'cartItems', 'totalPrice'));
}

public function store(Request $request)
{
    // Validate and store the reservation
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'adresse' => 'required',
        'articles_commandes' => 'required|array',
        'total' => 'required|numeric',
        'statut' => 'required|in:en attente,en préparation,prête',
        'date_commande' => 'required|date',
    ]);

    // Create a new reservation
    $reservation = Reservation::create([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'email' => $request->input('email'),
        'telephone' => $request->input('telephone'),
        'adresse' => $request->input('adresse'),
        'articles_commandes' => $request->input('articles_commandes'),
        'total' => $request->input('total'),
        'statut' => $request->input('statut'),
        'date_reservation' => now(), // Set the date automatically
    ]);
    dd($request->all(), $reservation);

    if ($reservation) {
        return redirect()->route('cart.index')->with('success', 'Réservation effectuée avec succès.');
    } else {
        return redirect()->back()->with('error', 'Erreur lors de la réservation.');
    }
}


    // Add other methods for CRUD operations if needed
}
