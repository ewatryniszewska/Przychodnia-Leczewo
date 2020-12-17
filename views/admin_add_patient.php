<?php require_once('views/after_login_header.php'); ?>

<h2>Nowy pacjent:</h2>

<form class="needs-validation" novalidate action="admin.php?add_patient" method="post">
    <div class="form-group">
        <label for="imie">Imię</label>
        <input type="text" class="form-control" name="imie" id="imie" required>
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko</label>
        <input type="text" class="form-control" name="nazwisko" id="nazwisko" required>
    </div>
    <div class="form-group">
        <label for="data_urodzenia">Data urodzenia</label>
        <input type="date" class="form-control" name="data_urodzenia" id="data_urodzenia" required>
    </div>
    <div class="form-group">
        <label for="pesel">PESEL</label>
        <input type="text" class="form-control" name="pesel" id="pesel" placeholder="12345678901" pattern="[0-9]{11}" required>
    </div>
    <div class="form-group">
        <label for="miasto">Miasto</label>
        <input type="text" class="form-control" name="miasto" id="miasto" required>
    </div>
    <div class="form-group">
        <label for="adres">Adres</label>
        <input type="text" class="form-control" name="adres" id="miasto" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="haslo">Hasło</label>
        <input type="password" class="form-control" name="haslo" id="haslo" required>
    </div>
    <button type="submit" class="btn btn-outline-info">Dodaj</button>
</form>

<?php require_once('views/after_login_footer.php'); ?>