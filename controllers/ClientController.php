<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/Client.php';
class ClientController
{
    private ClientRepository $clientRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
    }

    public function home()
    {

        require_once __DIR__ . '/../views/home.php';
    }

    public function allclients()
    {

        $clients = $this->clientRepository->getClients();


        require_once __DIR__ . "/../views/client-list.php";
    }


    public function forbidden()
    {
        require_once __DIR__ . '/../views/404.php';
        http_response_code(404);
    }

    public function show(int $client_id)
    {
        $client = $this->clientRepository->getClient($client_id);

        require_once __DIR__ . '/../views/client-view.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/client-create.php';
    }

    public function update()
    {
        $client = new Client();
        $client->setId($_POST['client_id']);
        $client->setFirstname($_POST['client_firstName']);
        $client->setLastname($_POST['client_lastName']);
        $client->setEmail($_POST['client_email']);
        // $client->setPhone($_POST['client_phone']);
        $client->setAddress($_POST['client_address']);
        $this->clientRepository->update($client);

        header('Location: ?action=client-list');
        exit;
    }

    public function edit(int $client_id)
    {
        $client = $this->clientRepository->getClient($client_id);
        require_once __DIR__ . '/../views/client-edit.php';
    }


    // public function delete(int $client_id)
    // {
    //     $this->clientRepository->delete($client_id);

    //     header('Location: ?');
    // }

    public function delete(int $client_id)
    {
        // Vérifier si le client a des comptes associés
        if ($this->clientRepository->hasAccounts($client_id)) {
            // Si le client a des comptes, on ne le supprime pas et on peut afficher un message
            echo "Impossible de supprimer le client car il possède des comptes.";
            return;
        }

        // Si le client n'a pas de comptes, on peut procéder à la suppression
        $this->clientRepository->delete($client_id);

        // Redirection après la suppression
        header('Location: ?action=client-list');
        exit;
    }






    public function store()
    {
        $client = new Client();
        $client->setFirstname($_POST['client_firstName']);
        $client->setLastname($_POST['client_lastName']);
        $client->setEmail($_POST['client_email']);
        $client->setPhone($_POST['client_phone']);
        $client->setAddress($_POST['client_address']);
        $this->clientRepository->create($client);
        header('Location: ?action=client-list');
    }

    public function afficherTotal()
    {
        $totalClients = $this->clientRepository->afficheNbTotal();
        require_once __DIR__ . '/../views/tableaubord.php';
    }


}
