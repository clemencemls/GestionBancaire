<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/AccountRepository.php"; ?>

<h2 class="mb-4">📋 Détail du compte </h2>


<?php
// $cl = new ClientRepository();
// $client = $cl->getClient(1);
?>

<p><strong>Iban : </strong> <?= $account->getAccountIban() ?></p>
<p><strong>Type : </strong> <?= $account->getAccountType()->value ?></p>
<p><strong>Solde : </strong> <?= $account->getAccountBalance() ?></p>
<p><strong>Id du client : </strong> <?= $account->getClientId() ?></p>

<a href="?action=account-edit&account_id=<?= $account->getAccountId() ?>" class="btn btn-warning">Modifier la fiche
    client</a>
<a href="?action=account-list" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php';
