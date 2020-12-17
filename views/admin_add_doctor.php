<?php require_once('views/after_login_header.php'); ?>

<h2>Nowy lekarz:</h2>

<form class="needs-validation" novalidate action="admin.php?add_doctor" method="post">
    <div class="form-group">
        <label for="imie">Imię</label>
        <input type="text" class="form-control" name="imie" id="imie" required>
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko</label>
        <input type="text" class="form-control" name="nazwisko" id="nazwisko" required>
    </div>
    <div class="form-group">
        <label for="specjalizacja">Specjalizacja</label>
        <select class="form-control" name="specjalizacja" id="specjalizacja" required>
            <option value="dentysta">Dentysta</option>
            <option value="endokrynolog">Endokrynolog</option>
            <option value="laryngolog">Laryngolog</option>
            <option value="inna">Inna</option>
        </select>
    </div>
    <div class="form-group">
        <label for="telefon">Numer telefonu</label>
        <input type="tel" class="form-control" name="telefon" id="telefon" placeholder="123456789" pattern="[0-9]{9}" required>
    </div>
    <div class="form-group">
        <label for="nr_gabinetu">Numer gabinetu</label>
        <input type="number" min="1" class="form-control" name="nr_gabinetu" id="nr_gabinetu" required>
    </div>
    <button type="submit" class="btn btn-outline-info">Dodaj</button>
</form>

<?php require_once('views/after_login_footer.php'); ?>