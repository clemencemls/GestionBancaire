<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/ClientRepository.php"; ?>

<h2 class="mb-4">📋 Détail de la fiche client</h2>


<?php
// $cl = new ClientRepository();
// $client = $cl->getClient(1);
?>

<p><strong>Prénom : </strong> <?= $client->getFirstname() ?></p>
<p><strong>Nom : </strong> <?= $client->getLastname() ?></p>
<p><strong>Email : </strong> <?= $client->getEmail() ?></p>
<p><strong>Téléphone : </strong> <?= $client->getPhone() ?></p>
<p><strong>Adresse: </strong> <?= $client->getAddress() ?></p>

<a href="?action=edit&client_id=<?= $client->getId() ?>" class="btn btn-warning">Modifier la fiche client</a>
<a href="?" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php';