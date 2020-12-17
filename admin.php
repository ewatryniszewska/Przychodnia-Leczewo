<?php

require_once('utils/is_authorized.php');
require_once('utils/data_base.php');

class Admin
{
    public function __construct()
    {
        $this->db = new DataBase();
        $this->aid = $_SESSION['admin'];
        $this->name = 'Admin';
    }

    public function load_main_page()
    {
        $active = "main";
        $aid = $this->aid;
        $name = $this->name;
        $nr_doctors = $this->db->count('lekarz');
        $nr_patients = $this->db->count('pacjent');
        $nr_registrations = $this->db->count('rejestracja');
        require_once('views/admin_main.php');
    }

    public function load_visits_page()
    {
        $active = "visits";
        $aid = $this->aid;
        $name = $this->name;
        $future_visits = $this->db->get_all_visits(true, false);
        $past_visits = $this->db->get_all_visits(false, true);
        require_once('views/admin_visits.php');
    }

    public function load_add_visit_page($get)
    {
        $active = "visits";
        $aid = $this->aid;
        $name = $this->name;

        if (isset($get['r']) && $get['r']) {
            $registration = $this->db->get_by_field('rejestracja', 'id', $get['r'])[0];
            $patients = $this->db->get_by_field('pacjent', 'id', $registration['id_pacjenta'], 'nazwisko, imie');
            $doctors = $this->db->get_by_field('lekarz', 'specjalizacja', $registration['specjalizacja'], 'specjalizacja, nazwisko, imie');
        } else {
            $patients = $this->db->get_all('pacjent', 'nazwisko, imie', false);
            $doctors = $this->db->get_all('lekarz', 'specjalizacja, nazwisko, imie');
        }
        require_once('views/admin_add_visit.php');
    }

    public function load_doctors_page()
    {
        $active = "doctors";
        $aid = $this->aid;
        $name = $this->name;
        $doctors = $this->db->get_all('lekarz', 'nazwisko, imie');
        require_once('views/admin_doctors.php');
    }

    public function load_add_doctor_page()
    {
        $active = "doctors";
        $aid = $this->aid;
        $name = $this->name;
        require_once('views/admin_add_doctor.php');
    }

    public function load_patients_page()
    {
        $active = "patients";
        $aid = $this->aid;
        $name = $this->name;
        $patients = $this->db->get_all('pacjent', 'nazwisko, imie');
        require_once('views/admin_patients.php');
    }

    public function load_add_patient_page()
    {
        $active = "patients";
        $aid = $this->aid;
        $name = $this->name;
        require_once('views/admin_add_patient.php');
    }

    public function load_registrations_page()
    {
        $active = "registrations";
        $aid = $this->aid;
        $name = $this->name;
        $registrations = $this->db->get_all_registrations();
        require_once('views/admin_registrations.php');
    }

    public function add_doctor($post)
    {
        if (
            !empty($post['specjalizacja']) && !empty($post['imie']) && !empty($post['nazwisko'])
            && !empty($post['telefon']) && !empty($post['nr_gabinetu'])
        ) {
            $this->db->add_doctor($post['imie'], $post['nazwisko'], $post['specjalizacja'], $post['telefon'], $post['nr_gabinetu']);
            $_SESSION['komunikat'] = "Dodano lekarza.";
            header("Location: admin.php?doctors");
            exit();
        }
        $_SESSION['komunikat'] = "Wprowadzono nieprawidłowe dane.";
        header("Location: admin.php?doctors");
    }

    public function add_patient($post)
    {
        if (
            !empty($post['imie']) && !empty($post['nazwisko']) && !empty($post['data_urodzenia'])
            && !empty($post['pesel']) && !empty($post['miasto']) && !empty($post['adres']) && !empty($post['email'])
            && !empty($post['haslo'])
        ) {
            $this->db->add_patient(
                $post['imie'],
                $post['nazwisko'],
                $post['data_urodzenia'],
                $post['pesel'],
                $post['miasto'],
                $post['adres'],
                $post['email'],
                $post['haslo']
            );
            $_SESSION['komunikat'] = "Dodano pacjenta.";
            header("Location: admin.php?patients");
            exit();
        }
        $_SESSION['komunikat'] = "Wprowadzono nieprawidłowe dane.";
        header("Location: admin.php?patients");
    }

    public function add_visit($post)
    {
        if (!empty($post['id_lekarza']) && !empty($post['id_pacjenta']) && !empty($post['data']) && !empty($post['czas'])) {
            $this->db->add_visit($post['id_lekarza'], $post['id_pacjenta'], $post['data'] . ' ' . $post['czas'] . ':00');

            if ($post['rejestracja']) {
                $this->db->remove($post['rejestracja'], 'rejestracja');
            }

            $_SESSION['komunikat'] = "Dodano wizytę.";
            header("Location: admin.php?visits");
            exit();
        }
        $_SESSION['komunikat'] = "Wprowadzono nieprawidłowe dane.";
        header("Location: admin.php?visits");
    }

    public function remove_doctor($post)
    {
        $this->db->remove($post['lekarz'], 'lekarz');
        $_SESSION['komunikat'] = "Usunięto lekarza.";
        header("Location: admin.php?doctors");
    }

    public function remove_patient($post)
    {
        $this->db->remove($post['pacjent'], 'pacjent');
        $_SESSION['komunikat'] = "Usunięto pacjenta.";
        header("Location: admin.php?patients");
    }

    public function remove_visit($post)
    {
        $this->db->remove($post['wizyta'], 'wizyta');
        $_SESSION['komunikat'] = "Usunięto wizytę.";
        header("Location: admin.php?visits");
    }

    public function remove_registration($post)
    {
        $this->db->remove($post['rejestracja'], 'rejestracja');
        $_SESSION['komunikat'] = "Usunięto zgłoszenie.";
        header("Location: admin.php?registrations");
    }
}

$ia = new IsAuthorized();

if ($ia->is_admin()) {
    $a = new Admin();
    if (isset($_GET['visits'])) {
        if (!empty($_POST)) {
            $a->remove_visit($_POST);
        } else {
            $a->load_visits_page();
        }
    } else if (isset($_GET['add_visit'])) {
        if (!empty($_POST)) {
            $a->add_visit($_POST);
        } else {
            $a->load_add_visit_page($_GET);
        }
    } else if (isset($_GET['doctors'])) {
        if (!empty($_POST)) {
            $a->remove_doctor($_POST);
        } else {
            $a->load_doctors_page();
        }
    } else if (isset($_GET['add_doctor'])) {
        if (!empty($_POST)) {
            $a->add_doctor($_POST);
        } else {
            $a->load_add_doctor_page();
        }
    } else if (isset($_GET['patients'])) {
        if (!empty($_POST)) {
            $a->remove_patient($_POST);
        } else {
            $a->load_patients_page();
        }
    } else if (isset($_GET['add_patient'])) {
        if (!empty($_POST)) {
            $a->add_patient($_POST);
        } else {
            $a->load_add_patient_page();
        }
    } else if (isset($_GET['registrations'])) {
        if (!empty($_POST)) {
            $a->remove_registration($_POST);
        } else {
            $a->load_registrations_page();
        }
    } else {
        $a->load_main_page();
    }
} else {
    header("Location: login.php");
}
