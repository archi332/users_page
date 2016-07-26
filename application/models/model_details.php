<?php

/**
 * Created by PhpStorm.
 * User: stk
 * Date: 26.07.16
 * Time: 18:32
 */
class model_details extends Model
{

    public function get_cur_user($id)
    {
        $sql = "SELECT * FROM `users_list` LEFT JOIN `user_city` ON users_list.city_id=user_city.id WHERE users_list.id = $id";

        return $this->query($sql);
    }
}