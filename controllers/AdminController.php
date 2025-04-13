<?php

require_once __DIR__ . '/../models/repositories/AdminRepository.php';

class AdminController
{
    private AdminRepository $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }

    public function login()
    {
        require_once __DIR__ . '/../views/home.php';
    }

    public function doLogin()
    {
        $admin_username = filter_input(INPUT_POST, 'admin_username');
        $admin_password = filter_input(INPUT_POST, 'admin_password');

        $admin = $this->adminRepository->getUserByUsername($admin_username);

        if (password_verify($admin_password, $admin->getAdminpassword())) {
            $_SESSION['admin_id'] = $admin->getAdminid();

            header('Location: ?action=client-list');
            exit;
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['admin_id']);
        header('Location: ?');
        exit;
    }
}

