<?php

class Logout
{
    public function log_out()
    {
        session_start();
        session_unset();
        $_SESSION["komunikat"] = "Wylogowano.";
        header("Location: login.php");
        exit();
    }
}

$l = new Logout();
$l->log_out();
