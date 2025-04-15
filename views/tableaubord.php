<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/../models/repositories/ClientRepository.php";
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . "/../models/repositories/AccountRepository.php"; ?>


<h1> Bienvenue ! </h1>
<br>
<h2>
    📋 <a href="?action=client-list" class="text-decoration-none text-dark">Nombre total de clients enregistrés :
        <?= $totalClients ?></a>
</h2>
<h2>
    🏦 <a href="?action=account-list" class="text-decoration-none text-dark"> Nombre total de comptes ouverts :
        <?= $totalAccounts ?></a>
</h2>
