@include('includes.navbar')

<div class="container">
    <h1>Modifier la Suggestion</h1>

    <form action="{{ route('suggestions.update', $suggestion) }}" method="post">
        @csrf
        @method('put') {{-- Assurez-vous d'ajouter la méthode PUT --}}

        <div class="mb-3">
            <label for="client_id" class="form-label">Sélectionnez le Client:</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $suggestion->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="suggestion">Suggestion:</label>
            <textarea class="form-control" name="suggestion" id="suggestion" rows="3" required>
                {{ $suggestion->suggestion }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour la Suggestion</button>
    </form>
</div>
