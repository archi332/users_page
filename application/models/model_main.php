<?php

class Model_Main extends Model
{

    /**
     * @return array info users from DB
     */
    public function get_info_users()
    {
        $sql = "SELECT users_list.id , `foto_name`,`sec_name`,`first_name`,`date_b`,`city_name` FROM `users_list` LEFT JOIN `user_city` ON users_list.city_id=user_city.id";

        return $this->query($sql);
    }




}
