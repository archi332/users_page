<h1>Список пользователей:</h1>

<p>
<table width="100%" class="table">
    <tr align="center">

        <td>foto</td>
        <td>sec_name</td>
        <td>first_name</td>
        <td>date_b</td>
        <td>city name</td>
        <td>dgfdg</td>
    </tr>
    <?php foreach($data as $value) : ?>
        <tr align="center">
            <td><img src="/images/<?php echo $value['foto_name']; ?>" align="left" height="50px"></td>
            <td><?php echo $value['sec_name']; ?></td>
            <td><?php echo $value['first_name']; ?></td>
            <td><?php echo $value['date_b']; ?></td>
            <td><?php echo $value['city_name']; ?></td>
            <td><a href="/edit?id=<?php echo $value['id']; ?>" class="btn btn-success">Details</a></td>
        </tr>
<?php endforeach; ?>
</table></p>
