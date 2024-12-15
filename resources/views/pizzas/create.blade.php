<!-- Modifier le formulaire pour la création d'une pizza -->
@include('includes.navbar')

<div class="container">
    <h1>Créer une Pizza</h1>
    <form action="{{ route('pizzas.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la Pizza</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
            <label for="taille" class="form-label">Taille de la Pizza</label>
            <select class="form-select" id="taille" name="taille" required>
                <option value="petit">Petit</option>
                <option value="moyen">Moyen</option>
                <option value="familial">Familial</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image de la Pizza</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer la Pizza</button>
    </form>
</div>
