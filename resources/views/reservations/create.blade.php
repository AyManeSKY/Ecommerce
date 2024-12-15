@include('layaouts')
@extends('layaouts.app')

<div class="container mt-5">
    <h1 class="mb-4">Passer une Réservation</h1>
    <form action="{{ route('reservations.store') }}" method="post">
        @csrf

        <!-- Display Cart Items -->
        <div class="mb-3">
            <label for="articles_commandes" class="form-label">Articles Commandés:</label>
            <ul>
                @foreach(session('cart') as $id => $pizza)
                    <li>{{ $pizza['nom'] }} - Prix: ${{ $pizza['prix'] }}</li>
                @endforeach
            </ul>
        </div>

        <!-- User Details -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone:</label>
            <input type="tel" name="telephone" id="telephone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse:</label>
            <textarea name="adresse" id="adresse" class="form-control"></textarea>
        </div>

        <!-- Hidden input fields to store cart items -->
        @foreach(session('cart') as $id => $pizza)
            <input type="hidden" name="cart_items[{{ $id }}][nom]" value="{{ $pizza['nom'] }}">
            <input type="hidden" name="cart_items[{{ $id }}][prix]" value="{{ $pizza['prix'] }}">
            <!-- Add other fields as needed -->
        @endforeach

        <!-- Additional Reservation Details -->
        <div class="mb-3">
            <label for="total" class="form-label">Prix Total:</label>
            <input type="text" name="total" id="total" class="form-control" value="{{ $totalPrice }}" readonly>
        </div>
        

        <div class="mb-3">
            <label for="statut" class="form-label">Statut:</label>
            <select name="statut" id="statut" class="form-control" required>
                <option value="en attente">En attente</option>
                <option value="en préparation">En préparation</option>
                <option value="prête">Prête</option>
            </select>
        </div>

       

        <button type="submit" class="btn btn-primary">Passer la Réservation</button>
    </form>
</div>
