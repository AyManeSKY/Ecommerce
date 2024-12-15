@include('includes.navbar')

<div class="container">
    <h1>Modifier la Commande</h1>

    <form action="{{ route('orders.update', $order) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="client_id" class="form-label">Sélectionnez le Client:</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>{{ $client->nom }} {{ $client->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Sélectionnez une Pizza:</label>
            <select name="pizza_id" id="pizza_id" class="form-control" required>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $order->pizza_id == $pizza->id ? 'selected' : '' }}>{{ $pizza->nom }} - {{ $pizza->taille }} - {{ $pizza->prix }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">État de la Commande:</label>
            <select name="etat" id="etat" class="form-control" required>
                <option value="en attente" {{ $order->etat == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="en préparation" {{ $order->etat == 'en préparation' ? 'selected' : '' }}>En préparation</option>
                <option value="prête" {{ $order->etat == 'prête' ? 'selected' : '' }}>Prête</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
