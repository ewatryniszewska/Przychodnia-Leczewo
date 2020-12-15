<?php

session_start();

class IsAuthorized
{
    public function is_patient()
    {
        return isset($_SESSION['pacjent']) ? $_SESSION['pacjent'] > 0 : false;
    }

    public function is_admin()
    {
        return isset($_SESSION['admin']) ? $_SESSION['admin'] > 0 : false;
    }
}
