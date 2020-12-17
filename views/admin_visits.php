<?php require_once('views/after_login_header.php'); ?>

<button class="btn btn-success right" onclick="document.location='admin.php?add_visit'">Dodaj</button>
<h2>Przyszłe wizyty:</h2>

<form action="admin.php?visits" method="post">
    <?php if ($future_visits) : ?>
        <?php
        $visits = $future_visits;
        $remove_button = true;
        include('views/visits_table.php');
        ?>
    <?php else : ?>
        <p>Brak wizyt.</p>
    <?php endif; ?>
</form>

<h2>Historia wizyt:</h2>
<?php if ($past_visits) : ?>
    <?php
    $visits = $past_visits;
    $remove_button = false;
    include('views/visits_table.php');
    ?>
<?php else : ?>
    <p>W histori nie ma wizyt.</p>
<?php endif; ?>

<?php require_once('views/after_login_footer.php'); ?>