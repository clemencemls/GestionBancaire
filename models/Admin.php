<?php


class Admin
{
    private int $admin_id;
    private string $admin_username;
    private string $admin_password;

    // Getter pour admin_id
    public function getAdminid(): int
    {
        return $this->admin_id;  // Ajout du return
    }

    // Getter pour admin_username
    public function getAdminusername(): string
    {
        return $this->admin_username;  // Ajout du return
    }

    // Getter pour admin_password
    public function getAdminpassword(): string
    {
        return $this->admin_password;  // Ajout du return
    }

    // Setter pour admin_id
    public function setAdminid(int $admin_id): void
    {
        $this->admin_id = $admin_id;
    }

    // Setter pour admin_username
    public function setAdminusername(string $admin_username): void
    {
        $this->admin_username = $admin_username;
    }

    // Setter pour admin_password
    public function setAdminpassword(string $admin_password): void
    {
        $this->admin_password = $admin_password;
    }
}
