<?php

require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../Admin.php';

class AdminRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getUserByUsername(string $admin_username): ?Admin
    {
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM admins WHERE admin_username = :admin_username');
        $statement->execute(['admin_username' => $admin_username]);

        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $admin = new Admin();
        $admin->setAdminid($result['admin_id']);
        $admin->setAdminusername($result['admin_username']);
        $admin->setAdminpassword($result['admin_password']);
        return $admin;
    }
}