<?php require_once('views/after_login_header.php'); ?>

<h1>Witaj w panelu pacjenta przychodni Leczewo!</h1>

<?php if ($visits) : ?>
    <h2>Twoje najbliższe wizyty:</h2>
    <?php include('views/patient_visits_table.php'); ?>
<?php else : ?>
    <p>Nie masz umówionych wizyt.</p>
    <div class="buttons">
        <button type="button" onclick="document.location='patient.php?set_visit'" class="btn btn-outline-info">Umów wizytę</button>
        <span>lub</span>
        <button type="button" onclick="document.location='patient.php?visits'" class="btn btn-outline-info">Sprawdź historię wizyt</button>
    </div>
<?php endif; ?>

<?php require_once('views/after_login_footer.php'); ?>