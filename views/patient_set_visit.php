<?php require_once('views/after_login_header.php'); ?>

<form class="needs-validation" action="patient.php?set_visit" method="POST" novalidate>
    <div class="form-group">
        <p>Wybierz specjalizację lekarza:</p>
        <select class="form-control" name="specjalizacja" id="specjalizacja" required>
            <option value="dentysta">Dentysta</option>
            <option value="endokrynolog">Endokrynolog</option>
            <option value="laryngolog">Laryngolog</option>
            <option value="inna">Inna</option>
        </select>
    </div>
    <div class="form-group">
        <p>Opisz swoje dolegliwości:</p>
        <textarea class="form-control" name="dolegliwosci" id="dolegliwosci" placeholder="Opis dolegliwosci" required></textarea>
    </div>
    <button type="submit" class="btn btn-outline-info">Poproś o umówienie wizyty</button>
</form>

<?php require_once('views/after_login_footer.php'); ?>