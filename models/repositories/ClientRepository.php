<?php

require_once __DIR__ . '/../Client.php';
require_once __DIR__ . '/../../lib/database.php';

class ClientRepository
{

    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection;

    }

    public function getClients(): array
    {
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM clients');
        $statement->execute();
        $clients = [];
        foreach ($statement as $row) {
            $client = new Client();
            $client->setId($row['client_id']);
            $client->setFirstname($row['client_firstName']);
            $client->setLastname($row['client_lastName']);
            $client->setEmail($row['client_email']);
            $client->setPhone($row['client_phone']);
            $client->setAddress($row['client_address']);

            $clients[] = $client;
        }

        return $clients;
    }


    public function getClient(int $client_id): ?Client
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM clients WHERE client_id=:client_id");
        $statement->execute(['client_id' => $client_id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $client = new Client();
        $client->setId($result['client_id']);
        $client->setFirstname($result['client_firstName']);
        $client->setLastname($result['client_lastName']);
        $client->setEmail($result['client_email']);
        $client->setPhone($result['client_phone']);
        $client->setAddress($result['client_address']);

        return $client;
    }


    public function create(Client $client): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO clients (client_firstName, client_lastName, client_email, client_phone, client_address) VALUES (:client_firstName, :client_lastName, :client_email, :client_phone, :client_address);');

        return $statement->execute([
            'client_firstName' => $client->getFirstname(),
            'client_lastName' => $client->getLastname(),
            'client_email' => $client->getEmail(),
            'client_phone' => $client->getPhone(),
            'client_address' => $client->getAddress(),

        ]);
    }

    public function update(Client $client): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE clients
                      SET client_firstName = :client_firstName,
                          client_lastName = :client_lastName,
                          client_email = :client_email,
                          client_phone = :client_phone,
                          client_address = :client_address
                      WHERE client_id = :client_id');

        // On sécurise les données avant de les exécuter
        return $statement->execute([
            'client_id' => $client->getId(),
            'client_firstName' => $client->getFirstname(),
            'client_lastName' => $client->getLastname(),
            'client_email' => $client->getEmail(),
            'client_phone' => $client->getPhone(),
            'client_address' => $client->getAddress(),
        ]);
    }



    public function delete(int $client_id): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM clients WHERE client_id = :client_id');
        $statement->bindParam(':client_id', $client_id);

        return $statement->execute();
    }



}