@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Liste des Suggestions</h1>
        </div>
        <div class="col mt-2">
            <a href="{{ route('suggestions.create') }}" class="btn btn-success">Ajouter une Suggestion</a>
        </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Suggestion</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suggestions as $suggestion)
                <tr>
                    <td>
                        {{ $suggestion->client ? $suggestion->client->nom : '' }}
                        {{ $suggestion->client ? $suggestion->client->prenom : '' }}
                    </td>
                    <td>{{ $suggestion->suggestion }}</td>
                    <td>
                        <a href="{{ route('suggestions.edit', $suggestion) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('suggestions.destroy', $suggestion) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette suggestion ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
