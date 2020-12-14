<?php
require_once('utils/data_base.php');

session_start();

class Login
{
    public function get()
    {
        require_once('views/login_page.php');
        unset($_SESSION["komunikat"]);
    }

    public function post($post)
    {
        $db = new DataBase();

        $user_id = $db->check_patient($post['email'], $post['haslo']); //tylko pacjenci?

        if ($user_id) {
            $_SESSION["zalogowano"] = true;
            $_SESSION["komunikat"] = "Prawidłowo zalogowano.";
            require_once('views/patient_view.php'); //chyba nie require?
        } else {
            $_SESSION["komunikat"] = "Nieprawidłowe dane logowania.";
            header("Location: login.php");
        }
    }
}

$l = new Login();

if (!empty($_POST)) {
    $l->post($_POST);
} else {
    $l->get();
}
