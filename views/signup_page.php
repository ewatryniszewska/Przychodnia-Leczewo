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
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["komunikat"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <form class="needs-validation" action="signup.php" method="POST" novalidate>
            <div>
                <img id="logo" src="images/logo.png">
                <h1>Rejestracja</h1>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="imie" id="imie" placeholder="Imię" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nazwisko" id="nazwisko" placeholder="Nazwisko" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="data_ur" id="data_ur" placeholder="Data urodzenia" required>
            </div>
            <div class="form-group">
                <input type="int" class="form-control" name="pesel" id="pesel" placeholder="Pesel" required pattern="\d{11}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="miasto" id="miasto" placeholder="Miasto" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="haslo" id="haslo" placeholder="Hasło" required>
            </div>
            <button type="submit" class="btn">Zarejestruj się</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>