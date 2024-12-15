@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Liste des Clients</h1>
        </div>
        <div class="col mt-2">
            <a href="{{ route('clients.create') }}" class="btn btn-success">Ajouter un Client</a>
        </div>
    </div>

    @foreach ($clients as $client)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">Profil de {{ $client->nom }} {{ $client->prenom }}</h2>
                <p class="card-text">Adresse: {{ $client->adresse }}</p>
                <p class="card-text">Numéro de téléphone: {{ $client->numero_telephone }}</p>
                <p class="card-text">Email: {{ $client->email }}</p>
                <div class="d-flex">
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary mr-2">Modifier</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
