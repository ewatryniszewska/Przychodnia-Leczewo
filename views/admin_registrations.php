<?php require_once('views/after_login_header.php'); ?>

<h2>Rejestracje:</h2>

<form action="admin.php?registrations" method="post">
    <?php if ($registrations) : ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Pacjent</th>
                    <th scope="col">Data urodzenia</th>
                    <th scope="col">Pesel</th>
                    <th scope="col">Adres zamieszkania</th>
                    <th scope="col">Adres e-mail</th>
                    <th scope="col">Wybrana specjalizacja</th>
                    <th scope="col">Dolegliwości</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations as $key => $value) : ?>
                    <tr>
                        <td><?php echo ($value['imie'] . ' ' . $value['nazwisko']); ?></td>
                        <td><?php echo ($value['data_urodzenia']); ?></td>
                        <td><?php echo ($value['pesel']); ?></td>
                        <td><?php echo ($value['adres'] . '; ' . $value['miasto']); ?></td>
                        <td><?php echo ($value['email']); ?></td>
                        <td><?php echo ($value['specjalizacja']); ?></td>
                        <td style="max-width: 200px"><?php echo ($value['dolegliwosci']); ?></td>
                        <td>
                            <button class="btn btn-outline-info btn-sm" type="button" onclick="document.location='admin.php?add_visit&r=<?php echo ($value['rid']); ?>'">Umów wizytę</button>
                            <button class="btn btn-danger btn-sm right" type="submit" name="rejestracja" value="<?php echo ($value['rid']); ?>">Usuń</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Brak oczekujących.</p>
    <?php endif; ?>
</form>

<?php require_once('views/after_login_footer.php'); ?>