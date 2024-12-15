@include('includes.navbar')

<div class="container">
    <h1 class="mt-4 mb-4">Laisser un Avis</h1>

    <form action="{{ route('reviews.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="client_id" class="form-label">Client:</label>
            <select class="form-control" name="client_id" id="client_id" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_id" class="form-label">Commande:</label>
            <select class="form-control" name="order_id" id="order_id" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">Commande {{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note:</label>
            <input type="number" class="form-control" name="note" id="note" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label for="commentaire" class="form-label">Commentaire:</label>
            <textarea class="form-control" name="commentaire" id="commentaire" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre l'Avis</button>
    </form>
</div>
