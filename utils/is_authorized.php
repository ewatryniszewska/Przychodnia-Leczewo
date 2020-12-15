<?php

session_start();

class IsAuthorized
{
    public function is_patient()
    {
        return $_SESSION['pacjent'] > 0;
    }

    public function is_admin()
    {
        return $_SESSION['admin'] > 0;
    }
}
