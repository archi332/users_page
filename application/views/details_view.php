<div>
    <h1>Detailes of <i>'<?php echo $data['sec_name'] . ' ' . $data['first_name']; ?>'</i></h1>

    <div>
        <div>
            <label>First name:</label>
            <?php echo $data['first_name']; ?>
        </div>
        <div>
            <label>Second name:</label>
            <?php echo $data['sec_name']; ?>
        </div>
        <div>
            <label>Email address:</label>
            <?php echo $data['email']; ?>
        </div>
        <div>
            <label>Post index:</label>
            <?php echo $data['post_index']; ?>
        </div>
        <div>
            <label>Date of birthday:</label>
            <?php echo $data['date_b']; ?>
        </div>
        <div>
            <label>City:</label>
            <?php echo $data['city_name']; ?>
        </div>
        <div>
            <label>Profile image:</label><br>
            <img src="/images/<?php echo $data['foto_name']; ?>" align="left" height="150px">
        </div>
    </div>

</div>