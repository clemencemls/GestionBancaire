<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion bancaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="?">📋 Gestion Bancaire</a>
            <div class="" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5"></div>

    <h2 class="mb-4">📋 CONNEXION PAGE </h2>

    <form action="?action=doLogin" method="POST">
        <div class="form-group">
            <label for="admin_username">Nom d'utilisateur</label> <br>
            <input class="admin_username" type="text" name="admin_username" id="admin_username" required>
        </div>
        <br>
        <div class="form-group">
            <label for="admin_password">Mot de passe</label><br>
            <input class="admin_password" type="password" name="admin_password" id="admin_password" required>
        </div>
        <div class="form-group"> <br>
            <button class="btn btn-primary" type="submit">Se connecter</button>
        </div>
    </form>
