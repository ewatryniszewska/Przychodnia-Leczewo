<?php require_once('views/after_login_header.php'); ?>

<h2>Twoje przyszłe wizyty:</h2>
<?php if ($future_visits) : ?>
    <?php
    $visits = $future_visits;
    include('views/patient_visits_table.php');
    ?>
<?php else : ?>
    <p>Nie masz umówionych wizyt.</p>
<?php endif; ?>

<h2>Historia wizyt:</h2>
<?php if ($past_visits) : ?>
    <?php
    $visits = $past_visits;
    include('views/patient_visits_table.php');
    ?>
<?php else : ?>
    <p>W histori nie ma wizyt.</p>
<?php endif; ?>

<?php require_once('views/after_login_footer.php'); ?>