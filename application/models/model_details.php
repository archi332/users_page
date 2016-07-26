<?php

class model_details extends Model
{

    /**
     * get info about current user from DB
     * @param $id
     * @return array
     */
    public function get_cur_user($id)
    {
        $sql = "SELECT * FROM `users_list` LEFT JOIN `user_city` ON users_list.city_id=user_city.id WHERE users_list.id = $id";

        return $this->query($sql);
    }
}