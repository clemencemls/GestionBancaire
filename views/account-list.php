<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/../models/repositories/AccountRepository.php";
?>

<h2 class="mb-4">📋 Liste des comptes</h2>
<a href="?action=account-create" class="btn btn-success mb-4">+ Nouveau compte</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Iban</th>
            <th>Type</th>
            <th>Solde</th>
            <th>Id du client</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?= $account->getAccountId(); ?></td>
                <td><?= $account->getAccountIban(); ?></td>
                <td><?= $account->getAccountType()->value; ?></td>
                <td><?= $account->getAccountBalance(); ?></td>
                <td><?= $account->getClientId(); ?></td>
                <td>
                    <a href="?action=account-view&account_id=<?= $account->getAccountId(); ?>"
                        class="btn btn-primary btn-sm">👀</a>
                    <a href="?action=account-edit&account_id=<?= $account->getAccountId(); ?>"
                        class="btn btn-warning btn-sm">✏️</a>
                    <a onclick="return confirm('T’es sûr ?');"
                        href="?action=account-delete&account_id=<?= $account->getAccountId(); ?>"
                        class="btn btn-dark btn-sm">❌</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
