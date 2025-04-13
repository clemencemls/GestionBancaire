<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/ClientRepository.php"; ?>

<h2 class="mb-4">✏️ Modifier une fiche client </h2>

<?php
//$cl = new ClientRepository();
//$client = $cl->getClient(1);
?>


<form action="?action=update" method="POST">
    <input type="hidden" name="client_id" value="<?= $client->getId() ?>">
    <div class="mb-3">
        <label for="firstname" class="form-label">Prénom :</label>
        <input type="text" class="form-control" id="client_firstName" name="client_firstName"
            value="<?= $client->getFirstname() ?>" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Nom :</label>
        <input type="text" class="form-control" id="client_lastName" name="client_lastName"
            value="<?= $client->getLastname() ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="client_email" name="client_email"
            value="<?= $client->getEmail() ?>" required>
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Telephone:</label>
        <input type="telephone" class="form-control" id="client_phone" name="client_phone"
            value="<?= $client->getPhone() ?>" required>
    </div>
    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse:</label>
        <input type="adresse" class="form-control" id="client_address" name="client_address"
            value="<?= $client->getAddress() ?>" required>
    </div>


    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<a href="?" class="btn btn-secondary">Retour à la liste</a>


<?php require_once __DIR__ . '/templates/footer.php';