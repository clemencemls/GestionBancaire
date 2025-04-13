<?php
session_start();
// echo password_hash('1234', PASSWORD_DEFAULT);

require_once __DIR__ . '/controllers/ClientController.php';
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/lib/utils.php';


// $clientRepo = new ClientRepository();
// $clients = $clientRepo->getClients();
// var_dump($clients);
// echo '<br>';
// $client2 = new ClientRepository();
// $clients2 = $client2->getClient(1);
// var_dump($clients2);


$clientController = new ClientController();
$adminController = new AdminController();

$action = $_GET['action'] ?? 'index'; // Si $_GET['action'] est null ou vide, alors on renvoi index. Sinon on renvoi $_GET['action']
$client_id = $_GET['client_id'] ?? null;

switch ($action) {
    case 'logout':
        $adminController->logout();
        break;
    case 'doLogin':
        $adminController->doLogin();
        break;
    case 'login':
        $adminController->login();
        break;
    case 'index':
        $clientController->home();
        break;
    case 'client-list':
        $clientController->allclients();
        break;
    case 'view':
        $clientController->show($client_id);
        break;
    case 'create':
        $clientController->create();
        break;
    case 'store':
        $clientController->store();
        break;
    case 'edit':
        $clientController->edit($client_id);
        break;
    case 'update':
        $clientController->update();
        break;
    case 'delete':
        $clientController->delete($client_id);
        break;
    default:
        $clientController->forbidden();
        break;
}
