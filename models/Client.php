<?php

require_once __DIR__ . '/../lib/database.php';

class Client
{
    private int $client_id;
    private string $client_firstName;
    private string $client_lastName;
    private string $client_email;
    private string $client_phone;
    private string $client_address;

    public function getId(): int
    {
        return $this->client_id;
    }

    public function getFirstname(): string
    {
        return $this->client_firstName;
    }

    public function getLastname(): string
    {
        return $this->client_lastName;
    }

    public function getEmail(): string
    {
        return $this->client_email;
    }

    public function getPhone(): string
    {
        return $this->client_phone;
    }

    public function getAddress(): string
    {
        return $this->client_address;
    }

    public function setId(int $client_id): void
    {
        $this->client_id = $client_id;
    }
    public function setFirstname(string $client_firstName): void
    {
        $this->client_firstName = $client_firstName;
    }

    public function setLastname(string $client_lastName): void
    {
        $this->client_lastName = $client_lastName;
    }

    public function setEmail(string $client_email): void
    {
        $this->client_email = $client_email;
    }

    public function setPhone(string $client_phone): void
    {
        $this->client_phone = $client_phone;
    }

    public function setAddress(string $client_address): void
    {
        $this->client_address = $client_address;
    }















}