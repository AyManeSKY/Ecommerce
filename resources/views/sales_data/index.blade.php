@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Données de Vente</h1>
        </div>
        <div class="col mt-2">
            <a href="{{ route('sales_data.create') }}" class="btn btn-success">Ajouter une Sale</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Commande ID</th>
                <th>Client</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $data)
                <tr>
                    <td>{{ $data->order->id }}</td>
                    <td>{{ $data->order->client->nom }} {{ $data->order->client->prenom }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>
                        <a href="{{ route('sales_data.edit', $data->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('sales_data.destroy', $data->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ces données de vente ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
