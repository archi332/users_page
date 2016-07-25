<?php

class Model_Main extends Model
{

    public function get_data()
    {
        $sql = "SELECT * FROM `users_list`";

        return $this->select($sql);

    }




}
