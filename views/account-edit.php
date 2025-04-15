<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/AccountRepository.php"; ?>

<h2 class="mb-4">✏️ Modifier un compte client </h2>

<?php
//$cl = new ClientRepository();
//$client = $cl->getClient(1);
?>


<form action="?action=account-update" method="POST">
    <input type="hidden" name="account_id" value="<?= $account->getAccountId() ?>">
    <div class="mb-3">
        <label for="firstname" class="form-label">Iban :</label>
        <input type="text" class="form-control" id="account_iban" name="account_iban"
            value="<?= $account->getAccountIban() ?>" required>
    </div>
    <div class="mb-3">
        <label for="account_type" class="form-label">Type de compte :</label>
        <select class="form-control" id="account_type" name="account_type" required>
            <option value="Assurance vie" <?= $account->getAccountType()->value === 'Assurance vie' ? 'selected' : '' ?>>
                Assurance vie</option>
            <option value="Assurance Habitation" <?= $account->getAccountType()->value === 'Assurance Habitation' ? 'selected' : '' ?>>Assurance Habitation</option>
            <option value="Crédit Immobilier" <?= $account->getAccountType()->value === 'Crédit Immobilier' ? 'selected' : '' ?>>Crédit Immobilier</option>
            <option value="Crédit à la consommation" <?= $account->getAccountType()->value === 'Crédit à la consommation' ? 'selected' : '' ?>>Crédit à la consommation</option>
            <option value="Compte Epargne Logement" <?= $account->getAccountType()->value === 'Compte Epargne Logement' ? 'selected' : '' ?>>Compte Epargne Logement</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="solde" class="form-label">Solde :</label>
        <input type="text" class="form-control" id="account_balance" name="account_balance"
            value="<?= $account->getAccountBalance() ?>" required>
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">ID du client:</label>
        <input type="texte" class="form-control" id="client_id" name="client_id" value="<?= $account->getClientId() ?>"
            required>
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<a href="?action=account-list" class="btn btn-secondary">Retour à la liste</a>


<?php require_once __DIR__ . '/templates/footer.php';
