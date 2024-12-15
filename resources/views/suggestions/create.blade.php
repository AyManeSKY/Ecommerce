@include('includes.navbar')

<div class="container">
    <h1>Faire une Suggestion</h1>

    <form action="{{ route('suggestions.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="client_id" class="form-label">Sélectionnez le Client:</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="suggestion">Suggestion:</label>
            <textarea class="form-control" name="suggestion" id="suggestion" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer la Suggestion</button>
    </form>
</div>
