<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/../models/repositories/ClientRepository.php";
?>

<h2 class="mb-4">📋 Liste des clients</h2>
<a href="?action=client-create" class="btn btn-success mb-4">+ Nouveau client</a>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Email</th>
      <th>Téléphone</th>
      <th>Adresse</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($clients as $client): ?>
      <tr>
        <td><?= $client->getId(); ?></td>
        <td><?= $client->getFirstname(); ?></td>
        <td><?= $client->getLastname(); ?></td>
        <td><?= $client->getEmail(); ?></td>
        <td><?= $client->getPhone(); ?></td>
        <td><?= $client->getAddress(); ?></td>
        <td>
          <a href="?action=client-view&client_id=<?= $client->getId(); ?>" class="btn btn-primary btn-sm">👀</a>
          <a href="?action=client-edit&client_id=<?= $client->getId(); ?>" class="btn btn-warning btn-sm">✏️</a>
          <a onclick="return confirm('T’es sûr ?');" href="?action=client-delete&client_id=<?= $client->getId(); ?>"
            class="btn btn-dark btn-sm">❌</a>

        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
