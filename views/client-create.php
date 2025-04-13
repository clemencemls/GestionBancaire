<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/ClientRepository.php"; ?>

<h2 class="mb-4">⊕ Créer une nouvelle fiche client</h2>

<form action="?action=store" method="POST">
    <div class="mb-3">
        <label for="firstname" class="form-label">Prénom :</label>
        <input type="text" class="form-control" id="client_firstName" name="client_firstName" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Nom :</label>
        <input type="text" class="form-control" id="client_lastName" name="client_lastName" required>
    </div>
    <div class="mb-3">
        <label for="email" class="email">Email :</label>
        <input type="text" class="form-control" id="client_email" name="client_email" required>
    </div>
    <div class="mb-3">
        <label for="telephone" class="telephone">Téléphone :</label>
        <input type="text" class="form-control" id="client_phone" name="client_phone" required>
    </div>
    <div class="mb-3">
        <label for="adresse" class="adresse">Adresse :</label>
        <input type="text" class="form-control" id="client_address" name="client_address" required>
    </div>


    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php';