<?php require_once('views/after_login_header.php'); ?>

<h2>Nowa wizyta:</h2>

<form class="needs-validation" novalidate action="admin.php?add_visit" method="post">
    <div class="form-group">
        <label for="id_lekarza">Lekarz</label>
        <select class="form-control" name="id_lekarza" id="id_lekarza" required>
            <?php foreach ($doctors as $key => $value) : ?>
                <option value="<?php echo ($value['id']) ?>">
                    <?php echo ($value['imie'] . ' ' . $value['nazwisko'] . ' - ' . $value['specjalizacja']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="id_pacjenta">Pacjent</label>
        <select class="form-control" name="id_pacjenta" id="id_pacjenta" required>
            <?php foreach ($patients as $key => $value) : ?>
                <option value="<?php echo ($value['id']) ?>">
                    <?php echo ($value['pesel'] . '; ' . $value['imie'] . ' ' . $value['nazwisko']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="data">Data wizyty</label>
        <input type="date" class="form-control" name="data" id="data" required>
    </div>
    <div class="form-group">
        <label for="vzas">Godzina rozpoczęcia wizyty</label>
        <select class="form-control" name="czas" id="czas" required>
            <?php foreach ([
                '07:00', '07:15', '07:30', '07:45', '08:00', '08:15', '08:30', '08:45',
                '09:00', '09:15', '09:30', '09:45', '10:00', '10:15', '10:30', '10:45',
                '11:00', '11:15', '11:30', '11:45', '12:00', '12:15', '12:30', '12:45',
                '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45',
                '15:00', '15:15', '15:30', '15:45', '16:00', '16:15', '16:30', '16:45',
                '17:00', '17:15', '17:30', '17:45', '18:00', '18:15', '18:30', '18:45',
                '19:00', '19:15', '19:30', '19:45', '20:00', '20:15', '20:30', '20:45'
            ] as $k => $hour) : ?>
                <option value="<?php echo ($hour) ?>">
                    <?php echo ($hour) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="rejestracja" value="<?php echo ($registration_id); ?>">
    <button type="submit" class="btn btn-outline-info">Dodaj</button>
</form>

<?php require_once('views/after_login_footer.php'); ?>