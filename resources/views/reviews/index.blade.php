@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Liste des Avis</h1>
        </div>
        <div class="col mt-2">
            <a href="{{ route('reviews.create') }}" class="btn btn-success">Ajouter une review</a>
        </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Review ID</th>
                <th>Utilisateur</th>
                <th>Commande ID</th>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id}}</td>
                    <td>{{ $review->client->nom }} {{ $review->client->prenom }}</td>
                    <td>{{ $review->order->id }}</td>
                    <td>{{ $review->note }}</td>
                    <td>{{ $review->commentaire }}</td>
                    <td>
                        <a href="{{ route('reviews.edit', $review) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('reviews.destroy', $review) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet avis ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
