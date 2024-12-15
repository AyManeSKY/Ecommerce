@include('includes.navbar')

<div class="container">
    <h1>Créer des Données de Vente</h1>

    <form action="{{ route('sales_data.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="order_id">Commande ID:</label>
            <select class="form-control" id="order_id" name="order_id" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">
                        {{ $order->id }} - {{ $order->client->nom }} {{ $order->client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantité:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" required>
        </div>
        <!-- Ajoutez d'autres champs au besoin -->

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
