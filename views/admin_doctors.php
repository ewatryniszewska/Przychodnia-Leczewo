<?php require_once('views/after_login_header.php'); ?>

<button class="btn btn-success right" onclick="document.location='admin.php?add_doctor'">Dodaj</button>
<h2>Lekarze:</h2>

<form action="admin.php?doctors" method="post">
    <?php if ($doctors) : ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Imie</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Specjalizacja</th>
                    <th scope="col">Numer telefonu</th>
                    <th scope="col">Numer gabinetu</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $key => $value) : ?>
                    <tr>
                        <td><?php echo ($value['imie']); ?></td>
                        <td><?php echo ($value['nazwisko']); ?></td>
                        <td><?php echo ($value['telefon']); ?></td>
                        <td><?php echo ($value['specjalizacja']); ?></td>
                        <td><?php echo ($value['nr_gabinetu']); ?></td>
                        <td><button class="btn btn-danger btn-sm right" type="submit" name="lekarz" value="<?php echo ($value['id']); ?>">Usuń</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Brak lekarzy.</p>
    <?php endif; ?>
</form>

<?php require_once('views/after_login_footer.php'); ?>