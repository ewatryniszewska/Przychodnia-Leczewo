<?php require_once('views/after_login_header.php'); ?>

<h1>Panel administratora</h1>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Lekarzy</p>
                <h3 class="card-text"><?php echo ($nr_doctors); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Pacjentów</p>
                <h3 class="card-text"><?php echo ($nr_patients); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Oczekujących na wizytę</p>
                <h3 class="card-text"><?php echo ($nr_registrations); ?></h3>
            </div>
        </div>
    </div>
</div>

<?php require_once('views/after_login_footer.php'); ?>