<?php

function isConnected()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

function isAdmin()
{
    if (!(isConnected())) {
        $_SESSION['flash_message'] = 'Vous n’avez pas les droits';
        header('Location: ?');
        exit;
    }
    return true;
}