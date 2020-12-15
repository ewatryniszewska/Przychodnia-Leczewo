<?php
require_once('utils/data_base.php');

session_start();

class Login
{
    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function load_login_page()
    {
        if (isset($_SESSION["zalogowano"])) {
            header('Location: patient.php'); // pacjent czy admin
            exit();
        }

        require_once('views/login_page.php');
        unset($_SESSION["komunikat"]);
    }

    public function log_in($post)
    {
        $user_id = $this->db->check_patient($post['email'], $post['haslo']); //tylko pacjenci?

        if ($user_id) {
            $_SESSION["pacjent"] = $user_id;
            $_SESSION["komunikat"] = "Prawidłowo zalogowano.";
            header('Location: patient.php');
        } else {
            $_SESSION["komunikat"] = "Nieprawidłowe dane logowania.";
            header("Location: login.php");
        }

        exit();
    }
}

$l = new Login();
if (!empty($_POST)) {
    $l->log_in($_POST);
} else {
    $l->load_login_page();
}
