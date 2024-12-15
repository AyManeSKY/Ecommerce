<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pizza; 

class PizzaController extends Controller
{

    
    public function index()
    {
        // Afficher la liste des pizzas
        $page_name = 'Pizzas';
        $pizzas = Pizza::all();
        return view('pizzas.index', compact('page_name','pizzas'));
    }

    public function create()
    {
        $page_name = 'Pizzas';
        return view('pizzas.create',compact('page_name'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string',
        'taille' => 'required|in:petit,moyen,familial',
        'description' => 'required|string',
        'prix' => 'required|numeric|min:0',
        'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:10240',
    ]);

    // Check if an image file is uploaded
    if ($request->hasFile('image')) {
        // Save the uploaded file
        $path = $request->file('image')->store('/images','public');

        // Create a new pizza record with the image path
        Pizza::create([
            'nom' => $request->input('nom'),
            'taille' => $request->input('taille'),
            'description' => $request->input('description'),
            'prix' => $request->input('prix'),
            'image' => $path,
        ]);
    } else {
        // If no image is uploaded, create a pizza record without the image field
        Pizza::create([
            'nom' => $request->input('nom'),
            'taille' => $request->input('taille'),
            'description' => $request->input('description'),
            'prix' => $request->input('prix'),
        ]);
    }

    return redirect()->route('pizzas.index')->with('success', 'Pizza ajoutée avec succès.');
}
    public function edit(Pizza $pizza)
    {
        $page_name = 'Pizzas';
        return view('pizzas.edit', compact('pizza','page_name'));
    }

    public function update(Request $request, Pizza $pizza)
{
    $request->validate([
        'nom' => 'required|string',
        'taille' => 'required|in:petit,moyen,familial',
        'description' => 'required|string',
        'prix' => 'required|numeric|min:0',
        'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:10240',
    ]);

    // Check if an image file is uploaded
    if ($request->hasFile('image')) {
        // Save the uploaded file
        $path = $request->file('image')->store('/images','public');

        // Update the pizza record with the new image path
        $pizza->update([
            'nom' => $request->input('nom'),
            'taille' => $request->input('taille'),
            'description' => $request->input('description'),
            'prix' => $request->input('prix'),
            'image' => $path,
        ]);
    } else {
        // If no new image is uploaded, update other fields without changing the image
        $pizza->update([
            'nom' => $request->input('nom'),
            'taille' => $request->input('taille'),
            'description' => $request->input('description'),
            'prix' => $request->input('prix'),
        ]);
    }

    return redirect()->route('pizzas.index')->with('success', 'Pizza mise à jour avec succès.');
}

    public function pizzaCart()
    {
        $page_name = 'Panier';
        return view('cart.index',compact('page_name'));
    }

    public function addPizzatoCart($id)
    {
        $pizza = Pizza::findOrFail($id);
    $cart = session()->get('cart',[]);
    if(isset($cart[$id])){
        $cart[$id]['quantite']++;
    }else{
        $cart[$id] = [
            "image" => $pizza->image,
            "nom" => $pizza->nom,
            "description" => $pizza->description, 
            "prix" => $pizza->prix,
            "quantite" => 1
        ];
    }
    session()->put('cart',$cart);
    return redirect()->back()->with('success', 'Pizza ajoutée au panier avec succès.');

    }

    public Function updateCart(Request $request)
    {
        if ($request->id and $request->quantite){
            $cart = session()->get('cart');
            $cart[$request->id]['quantite'] += intval($request->quantite);
            session()->put('cart',$cart);
            session()->flash('success','pizza added to cart');
        }
    }

    public function deleteProduct(Request $request)
    {
        
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','pizza successfully deleted');
        }
    }

    public function destroy(Pizza $pizza)
    {
        // Supprimez la pizza
        $pizza->delete();

        return redirect()->route('pizzas.index')->with('success', 'Pizza supprimée avec succès.');
    }
    // Ajoutez d'autres méthodes pour gérer les opérations CRUD pour les pizzas
}
