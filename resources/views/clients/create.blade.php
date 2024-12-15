
@include('includes.navbar')

<div class="container">
    <h1>Créer un Utilisateur</h1>
    <form action="{{ route('clients.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <textarea class="form-control" id="adresse" name="adresse" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="numero_telephone" class="form-label">Numéro de Téléphone</label>
            <input type="tel" class="form-control" id="numero_telephone" name="numero_telephone" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

