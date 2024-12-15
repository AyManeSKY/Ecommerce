@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Liste des Commandes</h1>
        </div>
        <div class="col mt-2">
            <a href="{{ route('orders.create') }}" class="btn btn-success">Ajouter un Order</a>
        </div>

    </div>
    

    <table class="table">
        <thead>
            <tr>
                <th>Commande ID</th>
                <th>Utilisateur</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        {{ $order->client ? $order->client->nom : 'Utilisateur non disponible' }}
                        {{ $order->client ? $order->client->prenom : '' }}
                    </td>
                    <td>{{ $order->etat }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
