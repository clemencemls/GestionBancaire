<?php

require_once __DIR__ . '/../Account.php';
require_once __DIR__ . '/../../lib/database.php';

class AccountRepository
{

    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection;

    }

    public function getAccounts(): array
    {
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM accounts');
        $statement->execute();
        $accounts = [];
        foreach ($statement as $row) {
            $account = new Account();
            $account->setAccountId($row['account_id']);
            $account->setAccountIban($row['account_iban']);
            $account->setAccountType(AccountType::from($row['account_type']));
            $account->setAccountBalance($row['account_balance']);
            $account->setClientId($row['client_id']);
            $accounts[] = $account;
        }

        return $accounts;
    }


    public function getAccount(int $account_id): ?Account
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM accounts WHERE account_id=:account_id");
        $statement->execute(['account_id' => $account_id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $account = new Account();
        $account->setAccountId($result['account_id']);
        $account->setAccountIban($result['account_iban']);
        $account->setAccountType(AccountType::from($result['account_type']));
        $account->setAccountBalance($result['account_balance']);
        $account->setClientId($result['client_id']);

        return $account;
    }


    public function create(Account $account): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO accounts (account_iban, account_type, account_balance, client_id) VALUES (:account_iban, :account_type, :account_balance, :client_id);');

        return $statement->execute([
            'account_iban' => $account->getAccountIban(),
            'account_type' => $account->getAccountType()->value, //méthode magique ->value sur l’enum pour obtenir sa valeur string :
            'account_balance' => $account->getAccountBalance(),
            'client_id' => $account->getClientId(),

        ]);
    }

    public function update(Account $account): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE accounts
                      SET account_iban = :account_iban,
                          account_type = :account_type,
                          account_balance = :account_balance,
                          client_id = :client_id
                      WHERE client_id = :client_id');

        // On sécurise les données avant de les exécuter
        return $statement->execute([
            'account_id' => $account->getAccountId(),
            'account_iban' => $account->getAccountIban(),
            'account_type' => $account->getAccountType()->value,
            'account_balance' => $account->getAccountBalance(),
            'client_id' => $account->getClientId(),
        ]);
    }



    public function delete(int $account_id): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM accounts WHERE account_id = :account_id');
        $statement->bindParam(':account_id', $account_id);

        return $statement->execute();
    }
    public function afficheNbTotal(): int
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('SELECT COUNT(*) AS total FROM accounts');
        $statement->execute();
        $result = $statement->fetch();
        return $result['total'];
    }
}
