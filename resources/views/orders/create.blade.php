@include('includes.navbar')

<div class="container">
    <h1>Passer une Commande</h1>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf

        <!-- Sélectionnez le client -->
        <div class="mb-3">
            <label for="client_id" class="form-label">Sélectionnez le Client:</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                @endforeach
            </select>
        </div>
        

        <!-- Sélectionnez la pizza -->
        <div class="mb-3">
            <label for="pizza_id" class="form-label">Sélectionnez une Pizza:</label>
            <select name="pizza_id" id="pizza_id" class="form-control" required>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->nom }} - {{ $pizza->taille }} - {{ $pizza->prix }}</option>
                @endforeach
            </select>
        </div>

        <!-- Champ pour l'état de la commande -->
        <div class="mb-3">
            <label for="etat" class="form-label">État de la Commande:</label>
            <select name="etat" id="etat" class="form-control" required>
                <option value="en attente">En attente</option>
                <option value="en préparation">En préparation</option>
                <option value="prête">Prête</option>
            </select>
        </div>

        

        <button type="submit" class="btn btn-primary">Passer la Commande</button>
    </form>
</div>
