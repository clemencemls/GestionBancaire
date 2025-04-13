<?php

class Admin
{
    private int $admin_id;
    private string $admin_username;
    private string $admin_password;


    public function getAdminid()
    {
        $this->admin_id;
    }

    public function getAdminsername()
    {
        $this->admin_username;
    }

    public function getAdminpassword()
    {
        $this->admin_password;
    }

    public function setAdminid(int $admin_id)
    {
        $this->admin_id = $admin_id;
    }

    public function setAdminusername(string $admin_username)
    {
        $this->admin_username = $admin_username;
    }

    public function setAdminpassword(string $admin_password)
    {
        $this->admin_password = $admin_password;
    }








}