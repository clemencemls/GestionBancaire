<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/AccountRepository.php"; ?>

<h2 class="mb-4">⊕ Créer un nouveau compte client</h2>

<form action="?action=client-store" method="POST">
    <div class="mb-3">
        <label for="firstname" class="form-label">Iban :</label>
        <input type="text" class="form-control" id="account_iban" name="account_iban" required>
    </div>
    <div class="mb-3">
        <label for="account_type" class="form-label">Type de compte :</label>
        <select class="form-select" id="account_type" name="account_type" required>
            <?php foreach ($types as $type): ?>
                <option value="<?= $type ?>" <?= $type === $currentType ? 'selected' : '' ?>>
                    <?= $type ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="email">Solde :</label>
        <input type="text" class="form-control" id="account_balance" name="account_balance" required>
    </div>
    <div class="mb-3">
        <label for="telephone" class="telephone">ID du client :</label>
        <input type="text" class="form-control" id="client_id" name="client_id" required>
    </div>


    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?action=account-list" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php';
