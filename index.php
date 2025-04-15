<?php
session_start();
// echo password_hash('1234', PASSWORD_DEFAULT);

require_once __DIR__ . '/controllers/ClientController.php';
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/AccountController.php';
require_once __DIR__ . '/lib/utils.php';


// $clientRepo = new ClientRepository();
// $clients = $clientRepo->getClients();
// var_dump($clients);
// echo '<br>';
// $client2 = new ClientRepository();
// $clients2 = $client2->getClient(1);
// var_dump($clients2);


$clientController = new ClientController();
$accountController = new AccountController();
$adminController = new AdminController();

$action = $_GET['action'] ?? 'index'; // Si $_GET['action'] est null ou vide, alors on renvoi index. Sinon on renvoi $_GET['action']
$client_id = $_GET['client_id'] ?? null;
$account_id = $_GET['account_id'] ?? null;

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
    case 'home':
        $adminController->login();
        break;
    case 'index':
        $adminController->login();
        break;
    case 'tableaubord':
        $adminController->showTableauBord();
        break;
    case 'client-list':
        $clientController->allclients();
        break;
    case 'client-view':
        $clientController->show($client_id);
        break;
    case 'client-create':
        $clientController->create();
        break;
    case 'client-store':
        $clientController->store();
        break;
    case 'client-edit':
        $clientController->edit($client_id);
        break;
    case 'client-update':
        $clientController->update();
        break;
    case 'client-delete':
        $clientController->delete($client_id);
        break;
    case 'account-list':
        $accountController->allaccounts();
        break;
    case 'account-view':
        $accountController->show($account_id);
        break;
    case 'account-create':
        $accountController->create();
        break;
    case 'account-store':
        $accountController->store();
        break;
    case 'account-edit':
        $accountController->edit($account_id);
        break;
    case 'account-update':
        $accountController->update();
        break;
    case 'account-delete':
        $accountController->delete($account_id);
        break;
    default:
        $clientController->forbidden();
        break;
}
