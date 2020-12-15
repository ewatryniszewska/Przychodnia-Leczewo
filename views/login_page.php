<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Logowanie</title>

    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="container">
        <?php if (isset($_SESSION["komunikat"])) : ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["komunikat"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div>
                <a href="./"><img id="logo" src="images/logo.png"></a>
                <h1>Logowanie</h1>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="haslo" id="haslo" placeholder="Hasło">
            </div>
            <div class="link">
                Nie masz jeszcze konta? <a href="signup.php">Stwórz nowe!</a>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="true" id="admin" name="admin">
                <label class="form-check-label" for="admin">
                    Zaloguj jako administrator
                </label>
            </div>
            <button type="submit" class="btn">Zaloguj</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>