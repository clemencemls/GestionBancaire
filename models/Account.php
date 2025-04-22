<?php

require_once __DIR__ . '/../lib/database.php';

enum AccountType: string
{
    case ASSURANCE_VIE = 'Assurance vie';
    case ASSURANCE_HABITATION = 'Assurance Habitation';
    case CREDIT_IMMOBILIER = 'Crédit Immobilier';
    case CREDIT_CONSO = 'Crédit à la consommation';
    case COMPTE_EPARGNE_LOGEMENT = 'Compte Epargne Logement';
}
class Account
{
    private int $account_id;
    private string $account_iban;
    private AccountType $account_type;
    private string $account_balance;
    private int $client_id; //// Clé étrangère vers la table Client


    public function getAccountId(): int
    {
        return $this->account_id;
    }

    public function getAccountIban(): string
    {
        return $this->account_iban;
    }

    public function getAccountType(): AccountType
    {
        return $this->account_type;
    }

    public function getAccountBalance(): string
    {
        return $this->account_balance;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

    // Setters
    public function setAccountId(int $account_id): void
    {
        $this->account_id = $account_id;
    }

    public function setAccountIban(string $account_iban): void
    {
        $this->account_iban = htmlspecialchars($account_iban);
    }

    public function setAccountType(AccountType $account_type): void
    {
        $this->account_type = $account_type;
    }

    public function setAccountBalance(string $account_balance): void
    {
        $this->account_balance = htmlspecialchars($account_balance);
    }

    public function setClientId(int $client_id): void
    {
        $this->client_id = $client_id;
    }
}
