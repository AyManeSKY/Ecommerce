<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesData;
use App\Models\Order;

class SalesController extends Controller
{
    public function index()
    {

        $page_name = 'Sales';
        // Afficher les données de vente
        $salesData = SalesData::all();
        $orders = Order::all();

        return view('sales_data.index', compact('page_name','salesData','orders'));
    }

    public function create()
    {
        $page_name = 'Sales';
        // Afficher le formulaire de création
        $orders = Order::all();

        return view('sales_data.create', compact('orders','page_name'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'order_id' => 'required',
            'quantity' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Créer une nouvelle instance de SalesData
        SalesData::create([
            'order_id' => $request->input('order_id'),
            'quantity' => $request->input('quantity'),
            // Ajoutez d'autres champs au besoin
        ]);

        // Rediriger vers la page d'index avec un message de succès
        return redirect()->route('sales_data.index')->with('success', 'Données de vente créées avec succès.');
    }

    public function edit(SalesData $sale)
    {
        $page_name = 'Sales';
        // Afficher le formulaire de modification
        $orders = Order::all();

        return view('sales_data.edit', compact('sale','orders','page_name'));
    }

    public function update(Request $request, SalesData $sale)
    {
        // Valider les données du formulaire
        $request->validate([
            'order_id' => 'required',
            'quantity' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Mettre à jour les données de vente existantes
        $sale->update([
            'order_id' => $request->input('order_id'),
            'quantity' => $request->input('quantity'),
            // Ajoutez d'autres champs au besoin
        ]);

        // Rediriger vers la page d'index avec un message de succès
        return redirect()->route('sales_data.index')->with('success', 'Données de vente mises à jour avec succès.');
    }

    public function destroy(SalesData $sale)
    {
        // Supprimer les données de vente
        $sale->delete();

        // Rediriger vers la page d'index avec un message de succès
        return redirect()->route('sales_data.index')->with('success', 'Données de vente supprimées avec succès.');
    }

    // Ajoutez d'autres méthodes pour gérer les opérations CRUD pour les données de vente
}
