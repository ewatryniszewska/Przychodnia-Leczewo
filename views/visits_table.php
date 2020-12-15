<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Data wizyty</th>
            <th scope="col">Imię lekarza</th>
            <th scope="col">Nazwisko lekarza</th>
            <th scope="col">Numer telefonu</th>
            <th scope="col">Specjalizacja</th>
            <th scope="col">Numer gabinetu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($visits as $key => $value) : ?>
            <tr>
                <td><?php echo ($value['data_wizyty']); ?></td>
                <td><?php echo ($value['imie']); ?></td>
                <td><?php echo ($value['nazwisko']); ?></td>
                <td><?php echo ($value['telefon']); ?></td>
                <td><?php echo ($value['specjalizacja']); ?></td>
                <td><?php echo ($value['nr_gabinetu']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>