@include('includes.navbar')

<div class="container">
    <h1 class="mt-4 mb-4">Modifier l'Avis</h1>

    <form action="{{ route('reviews.update', $review) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="note" class="form-label">Note:</label>
            <input type="number" class="form-control" name="note" id="note" min="1" max="5" value="{{ $review->note }}" required>
        </div>

        <div class="mb-3">
            <label for="commentaire" class="form-label">Commentaire:</label>
            <textarea class="form-control" name="commentaire" id="commentaire" rows="3" required>{{ $review->commentaire }}</textarea>
        </div>

        <div class="mb-3">
            <label for="client_id" class="form-label">Sélectionnez le Client:</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $review->client_id == $client->id ? 'selected' : '' }}>{{ $client->nom }} {{ $client->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_id" class="form-label">Sélectionnez la Commande:</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" {{ $review->order_id == $order->id ? 'selected' : '' }}>Commande ID {{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
