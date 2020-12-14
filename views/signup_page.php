<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Rejestracja</title>

    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="container">
        <?php if (isset($_SESSION["komunikat"])) : ?>
            <div class="alert alert-light alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["komunikat"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <form action="signup.php" method="POST">
            <div>
                <img id="logo" src="images/logo.png">
                <h1>Rejestracja</h1>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="imie" id="imie" placeholder="Imię">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nazwisko" id="nazwisko" placeholder="Nazwisko">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="data_ur" id="data_ur" placeholder="Data urodzenia">
            </div>
            <div class="form-group">
                <input type="int" class="form-control" name="pesel" id="pesel" placeholder="Pesel">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="miasto" id="miasto" placeholder="Miasto">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="haslo" id="haslo" placeholder="Hasło">
            </div>
            <button type="submit" class="btn">Zarejestruj się</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>