<?php

class upload {

    /**
     * upload file on server
     * @return void
     */
    function upload_file()
    {
        $uploaddir = '././images/';

        $uploadfile = $uploaddir.basename(date('Ymd') . '_' . $_FILES['foto_name']['name']);

        copy($_FILES['foto_name']['tmp_name'], $uploadfile);
    }

}