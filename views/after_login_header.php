<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Przychodnia</title>

    <link rel="stylesheet" href="css/after_login.css">
</head>

<body>
    <?php if (isset($_SESSION["komunikat"])) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <?php echo $_SESSION["komunikat"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION["komunikat"]); ?>
    <?php endif; ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="./"><img class="logo" src="images/logo.png"></a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <?php if (isset($pid)) : ?>
                <div class="navbar-nav">
                    <a class="nav-item nav-link <?php echo ($active == 'main' ? 'active' : ''); ?>" href="patient.php">Najbliższe wizyty</a>
                    <a class="nav-item nav-link <?php echo ($active == 'visits' ? 'active' : ''); ?>" href="patient.php?visits">Wszystkie wizyty</a>
                    <a class="nav-item nav-link <?php echo ($active == 'set_visit' ? 'active' : ''); ?>" href="patient.php?set_visit">Umów wizytę</a>
                </div>
                <?php else : if (isset($aid)) : ?>
                    <div class="navbar-nav">
                        <a class="nav-item nav-link <?php echo ($active == 'main' ? 'active' : ''); ?>" href="admin.php">Podsumowanie</a>
                        <a class="nav-item nav-link <?php echo ($active == 'doctors' ? 'active' : ''); ?>" href="admin.php?doctors">Lekarze</a>
                        <a class="nav-item nav-link <?php echo ($active == 'patients' ? 'active' : ''); ?>" href="admin.php?patients">Pacjenci</a>
                        <a class="nav-item nav-link <?php echo ($active == 'visits' ? 'active' : ''); ?>" href="admin.php?visits">Wizyty</a>
                        <a class="nav-item nav-link <?php echo ($active == 'registrations' ? 'active' : ''); ?>" href="admin.php?registrations">Rejestracje</a>
                    </div>
            <?php
                endif;
            endif;
            ?>
        </div>

        <?php if ($name) : ?>
            <p>Witaj <?php echo ($name); ?></p>
        <?php endif; ?>
        <button class="btn btn-outline-dark" onclick="document.location='logout.php'">Wyloguj</button>
    </nav>
    <main>