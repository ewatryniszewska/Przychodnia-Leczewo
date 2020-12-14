<?php
require_once('utils/data_base.php');

session_start();

class Signup
{
    public function get()
    {
        require_once('views/signup_page.php');
        unset($_SESSION["komunikat"]);
    }

    public function post($post)
    {
        if (
            !empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['data_ur']) && !empty($_POST['pesel'])
            && !empty($_POST['miasto']) && !empty($_POST['adres']) && !empty($_POST['email']) && !empty($_POST['haslo'])
        ) {
            $db = new DataBase();

            $db->add_patient(
                $post['imie'],
                $post['nazwisko'],
                $post['data_ur'],
                $post['pesel'],
                $post['miasto'],
                $post['adres'],
                $post['email'],
                $post['haslo']
            );
            $_SESSION["zarejestrowano"] = true;
            $_SESSION["komunikat"] = "Rejestracja zakończona.";
            header("Location: signup.php");
        } else {
            $_SESSION["komunikat"] = "Uzupełnij wszystkie pola.";
            header("Location: signup.php");
        }
    }
}

$s = new Signup;
if (!empty($_POST)) {
    $s->post($_POST);
} else {
    $s->get();
}
