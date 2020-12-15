<?php

require_once('utils/is_authorized.php');

class Main
{
    public function main()
    {
        $ia = new IsAuthorized();
        $is_patient = $ia->is_patient();
        $is_admin = $ia->is_admin();
        require_once('views/main_page.php');
    }
}

$m = new Main();
$m->main();
