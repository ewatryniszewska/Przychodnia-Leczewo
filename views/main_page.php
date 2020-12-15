<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Leczewo - przychodnia dla ludzi!</title>

    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <a href="./"><img src="images/logo_white.png"></a>
        <nav class="right">
            <?php if($is_patient || $is_admin): ?>
                <button class="btn btn-outline-light"
                        onclick="document.location='<?php echo (($is_admin ? 'admin' : 'patient') . '.php'); ?>'">
                    Przejdź do panelu
                </button>
            <?php else: ?>
                <button class="btn btn-light" onclick="document.location='login.php'">Zaloguj się</button>
                <button class="btn btn-outline-light" onclick="document.location='signup.php'">Zarejestruj się</button>
            <?php endif; ?>
        </nav>
        <nav class="left">
            <button class="btn btn-link" onclick="alert('to tylko demo')">Informacje dla pacjentów</button>
            <button class="btn btn-link" onclick="alert('to tylko demo')">Obsługa firm</button>
            <button class="btn btn-link" onclick="alert('to tylko demo')">Usługi</button>
        </nav>
        <div class="clear"></div>
    </header>
    <div class="big-photo" id="photo1">
    </div>
    <div class="clear"></div>
    <main>
        <article>
            <h3>Uważaj na Koronawirusa!</h3>
            <p>Koronawirus jest bardzo groźny! Uważaj, żeby na niego nie nadepnąć.</p>
        </article>
        <article>
            <h3>Ogłoszenie przychodni Leczewo</h3>
            <p>Szanowni Państwo,</p>
            <p>Zawiadamiamy, że nasza przychodnia jest dla ludzi!</p>
        </article>
    </main>
    <div class="clear"></div>
    <footer>
        <section class="left">
            <p>Kontakt: zero osiemset pińćset pińćset</p>
            <p>Pomoc w nagłych przypadkach: 112</p>
            <p>Adres: Pod Papugami 1, Gdańsk</p>
        </section>
        <section class="right">
            <p>&copy; by Przychodnia "Leczewo" niespółka z o. o.</p>
            <p><b>Projekt & Wykonanie: Ewa Tryniszewska</b></p>
        </section>
    </footer>
</body>

</html>