<?php require_once('views/after_login_header.php'); ?>

<button class="btn btn-success right" onclick="document.location='admin.php?add_patient'">Dodaj</button>
<h2>Pacjenci:</h2>

<form action="admin.php?patients" method="post">
    <?php if ($patients) : ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Imie</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Data urodzenia</th>
                    <th scope="col">Pesel</th>
                    <th scope="col">Adres zamieszkania</th>
                    <th scope="col">Adres e-mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $key => $value) : ?>
                    <tr>
                        <td><?php echo ($value['imie']); ?></td>
                        <td><?php echo ($value['nazwisko']); ?></td>
                        <td><?php echo ($value['data_urodzenia']); ?></td>
                        <td><?php echo ($value['pesel']); ?></td>
                        <td><?php echo ($value['adres'] . '; ' . $value['miasto']); ?></td>
                        <td><?php echo ($value['email']); ?></td>
                        <td><button class="btn btn-danger btn-sm right" type="submit" name="pacjent" value="<?php echo ($value['id']); ?>">Usuń</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Brak lekarzy.</p>
    <?php endif; ?>
</form>

<?php require_once('views/after_login_footer.php'); ?>