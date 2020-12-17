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

    public function add_visit($doctor_id, $patient_id, $date)
    {
        $sql = "INSERT INTO wizyta (id_lekarza, id_pacjenta, data_wizyty) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($doctor_id, $patient_id, $date));
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
            $sql_add .= " AND wizyta.data_wizyty " . ($future ? ">=" : "<") . " NOW()";
        }

        if ($number > 0) {
            $sql_add .= " LIMIT $number";
        }

        $sql = "SELECT wizyta.*, lekarz.* FROM wizyta LEFT JOIN lekarz ON wizyta.id_lekarza = lekarz.id WHERE wizyta.id_pacjenta = ?" . $sql_add;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($patient_id));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_visits($future = true, $past = true)
    {
        $sql_add = "";

        if ($future xor $past) {
            $sql_add .= " WHERE w.data_wizyty " . ($future ? ">=" : "<") . " NOW()";
        }

        $sql = "SELECT w.id AS wid, w.data_wizyty, l.*, p.imie AS imie_pacjenta, p.nazwisko AS nazwisko_pacjenta, " .
            "p.email AS email_pacjenta, p.pesel AS pesel_pacjenta, p.miasto AS miasto_pacjenta FROM wizyta AS w LEFT JOIN lekarz AS l ON " .
            "w.id_lekarza = l.id LEFT JOIN pacjent AS p ON w.id_pacjenta = p.id" . $sql_add . ' ORDER BY UNIX_TIMESTAMP(w.data_wizyty) DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_registrations()
    {
        $sql = "SELECT rejestracja.id AS rid, rejestracja.*, pacjent.* FROM rejestracja " .
            "LEFT JOIN pacjent ON rejestracja.id_pacjenta = pacjent.id ORDER BY rejestracja.id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all($table, $sort = null, $asc = true)
    {
        $sql = "SELECT * FROM $table" . ($sort ? " ORDER BY $sort " .  ($asc ? 'ASC' : 'DESC') : '');
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_by_field($table, $fname, $fvalue, $sort = null, $asc = true)
    {
        $sql = "SELECT * FROM $table WHERE $fname = ?" . ($sort ? " ORDER BY $sort " . ($asc ? 'ASC' : 'DESC') : '');
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($fvalue));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function remove($id, $table)
    {
        $sql = "DELETE FROM $table WHERE id = ?";
        echo $sql;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
    }

    public function count($table)
    {
        $sql = "SELECT COUNT(*) AS c FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['c'];
    }
}
