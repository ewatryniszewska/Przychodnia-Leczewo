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
        $sql = "select id from $table where email = ? and haslo = ?";
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

    public function add_patient($name, $surname, $date_of_birth, $pesel, $city, $address, $email, $password)
    {
        $sql = "insert into pacjent (imie, nazwisko, data_urodzenia, pesel, miasto, adres, haslo, email) values (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name, $surname, $date_of_birth, $pesel, $city, $address, $password, $email));
    }

    public function add_doctor($name, $surname, $specialization, $telephone, $office_nr)
    {
        $sql = "insert into lekarz (imie, nazwisko, specjalizacja, telefon, nr_gabinetu) values (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name, $surname, $specialization, $telephone, $office_nr));
    }
}
