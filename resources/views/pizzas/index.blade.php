@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Liste des Pizzas</h1>
        </div>
        <div class="col mt-2">
            <a href="{{ route('pizzas.create') }}" class="btn btn-success">Ajouter une Pizza</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Taille</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pizzas as $pizza)
                <tr>
                    <td>
                        @if($pizza->image)
                        <img src="{{ asset('storage/' . $pizza->image) }}" alt="{{ $pizza->nom }}" style="max-width: 100px;">
                        @else
                            Image non disponible
                        @endif
                    </td>
                    <td>{{ $pizza->nom }}</td>
                    <td>{{ $pizza->description }}</td>
                    <td>{{ $pizza->taille }}</td>
                    <td>{{ $pizza->prix }}</td>
                    <td>
                        <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
