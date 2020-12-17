<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Data wizyty</th>
            <th scope="col">Lekarz</th>
            <th scope="col">Specjalizacja</th>
            <th scope="col">Gabinet</th>
            <th scope="col">Pacjent</th>
            <th scope="col">PESEL pacjenta</th>
            <th scope="col">Miasto pacjenta</th>
            <?php if ($remove_button) : ?>
                <th scope="col"></th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($visits as $key => $value) : ?>
            <tr>
                <td><?php echo ($value['data_wizyty']); ?></td>
                <td><?php echo ($value['imie'] . ' ' . $value['nazwisko']); ?></td>
                <td><?php echo ($value['specjalizacja']); ?></td>
                <td><?php echo ($value['nr_gabinetu']); ?></td>
                <td><?php echo ($value['imie_pacjenta'] . ' ' . $value['nazwisko_pacjenta']); ?></td>
                <td><?php echo ($value['pesel_pacjenta']); ?></td>
                <td><?php echo ($value['miasto_pacjenta']); ?></td>
                <?php if ($remove_button) : ?>
                    <td><button class="btn btn-danger btn-sm right" type="submit" name="wizyta" value="<?php echo ($value['wid']); ?>">Usuń</button></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>