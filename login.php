<?php
require_once('utils/data_base.php');
require_once('utils/is_authorized.php');

class Login
{
    public function __construct()
    {
        $this->db = new DataBase();
        $this->ia = new IsAuthorized();
    }

    public function load_login_page()
    {
        if ($this->ia->is_patient()) {
            header('Location: patient.php');
            exit();
        }

        if ($this->ia->is_admin()) {
            header('Location: admin.php');
            exit();
        }

        require_once('views/login_page.php');
    }

    public function log_in($post)
    {
        if (isset($post['admin']) && $post['admin']) {
            $admin_id = $this->db->check_admin($post['email'], $post['haslo']);

            if ($admin_id) {
                $_SESSION["admin"] = $admin_id;
            }
        } else {
            $patient_id = $this->db->check_patient($post['email'], $post['haslo']);

            if ($patient_id) {
                $_SESSION["pacjent"] = $patient_id;
            }
        }

        if ((isset($patient_id) && $patient_id) || (isset($admin_id) && $admin_id)) {
            $_SESSION["komunikat"] = "Prawidłowo zalogowano.";
            header('Location: ' . (isset($admin_id) && $admin_id ? 'admin.php' : 'patient.php'));
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
