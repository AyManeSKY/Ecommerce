<!-- Modifier le formulaire pour la modification d'une pizza -->
@include('includes.navbar')

<div class="container">
    <h1>Modifier une Pizza</h1>
    <form action="{{ route('pizzas.update', $pizza) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la Pizza</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $pizza->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="taille" class="form-label">Taille de la Pizza</label>
            <select class="form-select" id="taille" name="taille" required>
                <option value="petit" {{ $pizza->taille === 'petit' ? 'selected' : '' }}>Petit</option>
                <option value="moyen" {{ $pizza->taille === 'moyen' ? 'selected' : '' }}>Moyen</option>
                <option value="familial" {{ $pizza->taille === 'familial' ? 'selected' : '' }}>Familial</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Ingrédients (séparés par des virgules)</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $pizza->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" step="0.01" value="{{ $pizza->prix }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image de la Pizza</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour la Pizza</button>
    </form>
</div>
