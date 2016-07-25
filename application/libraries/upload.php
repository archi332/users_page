<?php

class upload {

    /**
     * upload file on server
     * @return void
     */
    function upload_file($file_name)
    {
        $uploaddir = '././images/';

        $uploadfile = $uploaddir.basename($file_name);

        copy($_FILES['foto_name']['tmp_name'], $uploadfile);
    }

}