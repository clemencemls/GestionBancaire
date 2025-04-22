<?php

require_once __DIR__ . '/../models/repositories/AccountRepository.php';
require_once __DIR__ . '/../models/Account.php';
class AccountController
{
    private AccountRepository $accountRepository;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
    }

    public function home()
    {

        require_once __DIR__ . '/../views/home.php';
    }

    public function allaccounts()
    {

        $accounts = $this->accountRepository->getAccounts();


        require_once __DIR__ . "/../views/account-list.php";
    }


    public function forbidden()
    {
        require_once __DIR__ . '/../views/404.php';
        http_response_code(404);
    }

    public function show(int $account_id)
    {
        $account = $this->accountRepository->getAccount($account_id);

        require_once __DIR__ . '/../views/account-view.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/account-create.php';
    }

    public function update()
    {
        $accountType = AccountType::tryFrom($_POST['account_type']);
        // if (!$accountType) {
        //     // rediriger avec un message d’erreur, ou afficher une vue d’erreur
        //     throw new InvalidArgumentException("Type de compte invalide !");
        // }

        $account = new Account();
        $account->setAccountId((int) $_POST['account_id']);
        $account->setAccountIban($_POST['account_iban']);
        $account->setAccountType($accountType);
        $account->setAccountBalance($_POST['account_balance']);
        $account->setClientId((int) $_POST['client_id']);

        $this->accountRepository->update($account);

        header('Location: ?action=account-list');
        exit;
    }

    public function edit(int $account_id)
    {
        $account = $this->accountRepository->getAccount($account_id);
        require_once __DIR__ . '/../views/account-edit.php';
    }


    public function delete(int $account_id)
    {
        $this->accountRepository->delete($account_id);

        header('Location: ?');
    }


    public function store()
    {
        $accountType = AccountType::tryFrom($_POST['account_type']);
        // if (!$accountType) {
        //     // Gérer le cas où le type de compte n'est pas valide
        //     throw new InvalidArgumentException("Type de compte invalide !");
        // }
        $account = new Account();
        $account->setAccountIban($_POST['account_iban']);
        $account->setAccountType($accountType);
        $account->setAccountBalance($_POST['account_balance']);
        $account->setClientId((int) $_POST['client_id']);

        $this->accountRepository->create($account);

        header('Location: ?action=account-list');
        exit;
    }


}
