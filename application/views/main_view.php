<h1>Список пользователей:</h1>

<p>
<table width="100%" class="table">
    <tr align="center">

        <td><b>Photo</b></td>
        <td><b>sec_name</b></td>
        <td><b>first_name</b></td>
        <td><b>date_b</b></td>
        <td><b>city name</b></td>
        <td></td>
    </tr>
    <?php foreach($data as $value) : ?>
        <tr align="center">
            <td><img src="/images/<?php echo $value['foto_name']; ?>" align="left" height="50px"></td>
            <td><?php echo $value['sec_name']; ?></td>
            <td><?php echo $value['first_name']; ?></td>
            <td><?php echo $value['date_b']; ?></td>
            <td><?php echo $value['city_name']; ?></td>
            <td><a href="/details?user=<?php echo $value['id']; ?>" class="btn btn-success">Details</a></td>
        </tr>
<?php endforeach; ?>
</table></p>
