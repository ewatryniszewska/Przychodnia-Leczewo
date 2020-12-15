<?php

require_once('utils/is_authorized.php');
require_once('utils/data_base.php');

class Patient
{
    public function __construct()
    {
        $this->db = new DataBase();
        $this->pid = $_SESSION['pacjent'];
        $this->patient_name = $this->db->get_user_name($this->pid);
    }

    public function load_main_page()
    {
        $active = "main";
        $name = $this->patient_name;
        $visits = $this->db->get_visits($this->pid, true, false, 3);
        require_once('views/patient_main.php');
    }

    public function load_visits_page()
    {
        $active = "visits";
        $name = $this->patient_name;
        $future_visits = $this->db->get_visits($this->pid, true, false);
        $past_visits = $this->db->get_visits($this->pid, false, true);
        require_once('views/patient_visits.php');
    }

    public function load_set_visit_page()
    {
        $active = "set_visit";
        $name = $this->patient_name;
        require_once('views/patient_set_visit.php');
    }

    public function set_visit($post)
    {
        if (
            !empty($post['specjalizacja']) && !empty($post['dolegliwosci'])
        ) {
            $this->db->set_visit(
                $this->pid,
                $post['specjalizacja'],
                $post['dolegliwosci']
            );
            $_SESSION["komunikat"] = "Wysłano zapytanie o wizytę. Proszę czekać na odpowiedź.";
        } else {
            $_SESSION["komunikat"] = "Uzupełnij wszystkie pola.";
        }
        header("Location: patient.php");
    }
}

$ia = new IsAuthorized();

if ($ia->is_patient()) {
    $p = new Patient();

    if (isset($_GET['visits'])) {
        $p->load_visits_page();
    } else if (isset($_GET['set_visit'])) {
        if (!empty($_POST)) {
            $p->set_visit($_POST);
        } else {
            $p->load_set_visit_page();
        }
    } else {
        $p->load_main_page();
    }
} else {
    header("Location: login.php");
}
