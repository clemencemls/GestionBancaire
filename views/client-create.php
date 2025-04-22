<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/ClientRepository.php"; ?>

<h2 class="mb-4">⊕ Créer une nouvelle fiche client</h2>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>

    <form id="myForm" action="?action=client-store" method="POST">
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="client_firstName" name="client_firstName">
        </div>
        <div id="error_client_firstName" class="error"></div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="client_lastName" name="client_lastName">
        </div>
        <div id="error_client_lastName" class="error"></div>
        <div class="mb-3">
            <label for="email" class="email">Email :</label>
            <input type="text" class="form-control" id="client_email" name="client_email">
        </div>
        <div id="error_client_email" class="error"></div>
        <div class="mb-3">
            <label for="telephone" class="telephone">Téléphone :</label>
            <input type="text" class="form-control" id="client_phone" name="client_phone">
        </div>
        <div id="error_client_phone" class="error"></div>
        <div class="mb-3">
            <label for="adresse" class="adresse">Adresse :</label>
            <input type="text" class="form-control" id="client_address" name="client_address">
        </div>
        <div id="error_client_address" class="error"></div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <a href="?action=client-list" class="btn btn-secondary">Retour à la liste</a>

    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        document.getElementById("myForm").addEventListener("submit", (e) => {
            e.preventDefault();
            if (validationForm()) {
                console.log(e)
                document.getElementById("myForm").submit()
            }

        });

        // créer la fonction pour valider le formulaire
        function validationForm() {
            // recupérer les elements inputs
            let client_firstName = document.getElementById("client_firstName").value;
            let client_lastName = document.getElementById("client_lastName").value;
            let client_email = document.getElementById("client_email").value;
            let client_phone = document.getElementById("client_phone").value;
            let client_address = document.getElementById("client_address").value;


            // recuperer les elements d'erreurs
            let error_client_firstName = document.getElementById("error_client_firstName");
            let error_client_lastName = document.getElementById("error_client_lastName");
            let error_client_email = document.getElementById("error_client_email");
            let error_client_phone = document.getElementById("error_client_phone");
            let error_client_address = document.getElementById("error_client_address");


            //vider les divs
            error_client_firstName.innerHTML = "";
            error_client_lastName.innerHTML = "";
            error_client_email.innerHTML = "";
            error_client_phone.innerHTML = "";
            error_client_address.innerHTML = "";

            // // vider les inputs
            // document.getElementById("client_firstName").value = "";
            // document.getElementById("client_lastName").value = "";
            // document.getElementById("client_email").value = "";
            // document.getElementById("client_phone").value = "";
            // document.getElementById("client_address").value = "";
            // //
            let isValid = true;

            // Verifier le prénom
            if (client_firstName === "") {
                error_client_firstName.innerHTML = "Le prénom d'utilisateur est obligatoire.";

                isValid = false;
            }
            // Verifier le nom
            if (client_lastName === "") {
                error_client_lastName.innerHTML = "Le nom d'utilisateur est obligatoire.";

                isValid = false;
            }

            // Verifier l'adresse email
            if (client_email === "") {
                error_client_email.innerHTML = " L'adresse e-mail est obligatoire.";
                isValid = false;
            } else if (!client_email.includes("@")) {
                error_client_email.innerHTML = "Veuillez entrer une adresse e-mail valide.";
                isValid = false;
            }

            // Verifier le telephone
            if (client_phone === "") {
                error_client_phone.innerHTML = "Le téléphone est obligatoire.";

                isValid = false;
            }

            // Verifier l'adresse
            if (client_address === "") {
                error_client_address.innerHTML = "L'adresse est obligatoire.";

                isValid = false;
            }
            return isValid

        }
    </script>
</body>

</html>



<?php require_once __DIR__ . '/templates/footer.php';
