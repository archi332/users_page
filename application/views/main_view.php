<h1>Список пользователей:</h1>

<p>
<table width="100%" class="table">
    <tr align="center">
        <td>foto</td>
        <td>id</td>
        <td>first_name</td>
        <td>sec_name</td>
        <td>email</td>
        <td>date_b</td>
        <td>post_index</td>
        <td>foto_name</td>
        <td>country_id</td>
        <td></td>
    </tr>
    <?php foreach($data as $value) : ?>
        <tr>
            <td><img src="/images/<?php echo $value['foto_name']; ?>" align="left" height="50px"></td>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['first_name']; ?></td>
            <td><?php echo $value['sec_name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['date_b']; ?></td>
            <td><?php echo $value['post_index']; ?></td>
            <td><?php echo $value['foto_name']; ?></td>
            <td><?php echo $value['country_id']; ?></td>
            <td><a href="/edit?id=<?php echo $value['id']; ?>" class="btn btn-success">Details</a></td>
        </tr>
<?php endforeach; ?>
</table></p>
