<?php require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . "/../models/repositories/AccountRepository.php"; ?>

<h2 class="mb-4">⊕ Créer un nouveau compte client</h2>

<form id="myForm" action="?action=account-store" method="POST">
    <div class="mb-3">
        <label for="firstname" class="form-label">Iban :</label>
        <input type="text" class="form-control" id="account_iban" name="account_iban">
        <div id="error_account_iban" class="error"></div>
    </div>
    <div class="mb-3">
        <label for="account_type" class="form-label">Type de compte :</label>
        <select class="form-control" id="account_type" name="account_type">
            <option value="Please choose an option">--Please choose an option--</option>
            <option value="Assurance Vie">Assurance Vie</option>
            <option value="Assurance Habitation">Assurance Habitation</option>
            <option value="Crédit Immobilier">Crédit Immobilier</option>
            <option value="Crédit à la consommation">Crédit à la consommation</option>
            <option value="Compte Epargne Logement">Compte Epargne Logement</option>
            <div id="error_account_type" class="error"></div>
        </select>
        </select>
    </div>
    <div class="mb-3">
        <label for="balance" class="balance">Solde :</label>
        <input type="text" class="form-control" id="account_balance" name="account_balance">
        <div id="error_account_balance" class="error"></div>
    </div>
    <div class="mb-3">
        <label for="client_id" class="client_id">ID du client :</label>
        <input type="text" class="form-control" id="client_id" name="client_id">
        <div id="error_client_id" class="error"></div>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?action=account-list" class="btn btn-secondary">Retour à la liste</a>

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
        let account_iban = document.getElementById("account_iban").value;
        let account_type = document.getElementById("account_type").value;
        let account_balance = document.getElementById("account_balance").value;
        let client_id = document.getElementById("client_id").value;


        // recuperer les elements d'erreurs
        let error_account_iban = document.getElementById("error_account_iban");
        let error_account_type = document.getElementById("error_account_type");
        let error_account_balance = document.getElementById("error_account_balance");
        let error_client_id = document.getElementById("error_client_id");


        //vider les divs
        error_account_iban.innerHTML = "";
        error_client_lastName.innerHTML = "";
        error_account_type.innerHTML = "";
        error_account_balance.innerHTML = "";
        error_client_id.innerHTML = "";

        // // vider les inputs
        // document.getElementById("client_firstName").value = "";
        // document.getElementById("client_lastName").value = "";
        // document.getElementById("client_email").value = "";
        // document.getElementById("client_phone").value = "";
        // document.getElementById("client_address").value = "";
        // //
        let isValid = true;

        // Verifier l'iban
        if (account_iban === "") {
            error_account_iban.innerHTML = "L'IBAN est obligatoire.";

            isValid = false;
        }
        // Verifier le type de compte
        if (account_type === "Please choose an option") {
            error_account_type.innerHTML = "Le type de compte est obligatoire.";

            isValid = false;
        }

        // Verifier le solde
        if (account_balance === "") {
            error_account_balance.innerHTML = "Le type de compte est obligatoire.";

            isValid = false;
        }

        // Verifier l'id du client
        if (client_id === "") {
            error_client_id.innerHTML = "L'ID du client associé est obligatoire.";

            isValid = false;
        }
        return isValid

    }
</script>
</body>

</html>


<?php require_once __DIR__ . '/templates/footer.php';
