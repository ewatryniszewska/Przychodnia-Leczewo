<?php
class DataBase
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'przychodnia';
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->dbname;
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    public function check_user($table, $user_email, $password)
    {
        $sql = "SELECT id FROM $table WHERE email = ? AND haslo = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($user_email, $password));

        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public function check_admin($admin_email, $admin_passw)
    {
        return $this->check_user('admin', $admin_email, $admin_passw);
    }

    public function check_patient($patient_email, $patient_passw)
    {
        return $this->check_user('pacjent', $patient_email, $patient_passw);
    }

    public function get_user_name($user_id)
    {
        $sql = "SELECT imie FROM pacjent WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($user_id));

        return $stmt->fetch(PDO::FETCH_ASSOC)['imie'];
    }

    public function add_patient($name, $surname, $date_of_birth, $pesel, $city, $address, $email, $password)
    {
        $sql = "INSERT INTO pacjent (imie, nazwisko, data_urodzenia, pesel, miasto, adres, haslo, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name, $surname, $date_of_birth, $pesel, $city, $address, $password, $email));
    }

    public function add_doctor($name, $surname, $specialization, $telephone, $office_nr)
    {
        $sql = "INSERT INTO lekarz (imie, nazwisko, specjalizacja, telefon, nr_gabinetu) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name, $surname, $specialization, $telephone, $office_nr));
    }

    public function set_visit($user_id, $specialization, $ailments)
    {
        $sql = "INSERT INTO rejestracja (id_pacjenta, specjalizacja, dolegliwosci) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($user_id, $specialization, $ailments));
    }

    public function get_visits($patient_id, $future = true, $past = true, $number = 0)
    {
        $sql_add = "";

        if ($future xor $past) {
            $sql_add .= " AND wizyta.data_wizyty " . ($future ? ">=" : "<") . " CURDATE()";
        }

        if ($number > 0) {
            $sql_add .= " LIMIT $number";
        }

        $sql = "SELECT wizyta.*, lekarz.* FROM wizyta LEFT JOIN lekarz ON wizyta.id_lekarza = lekarz.id WHERE wizyta.id_pacjenta = ?" . $sql_add;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($patient_id));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
