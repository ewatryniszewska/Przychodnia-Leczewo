<?php
require_once('utils/data_base.php');

session_start();

class Signup
{
    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function load_signup_page()
    {
        require_once('views/signup_page.php');
        unset($_SESSION["komunikat"]);
    }

    public function sign_up($post)
    {
        if (
            !empty($post['imie']) && !empty($post['nazwisko']) && !empty($post['data_ur']) && !empty($post['pesel'])
            && !empty($post['miasto']) && !empty($post['adres']) && !empty($post['email']) && !empty($post['haslo'])
        ) {
            $this->db->add_patient(
                $post['imie'],
                $post['nazwisko'],
                $post['data_ur'],
                $post['pesel'],
                $post['miasto'],
                $post['adres'],
                $post['email'],
                $post['haslo']
            );
            $_SESSION["komunikat"] = "Rejestracja zakończona. Możesz już się zalogować.";
            header("Location: login.php");
        } else {
            $_SESSION["komunikat"] = "Uzupełnij wszystkie pola.";
            header("Location: signup.php");
        }
    }
}

$s = new Signup();
if (!empty($_POST)) {
    $s->sign_up($_POST);
} else {
    $s->load_signup_page();
}
