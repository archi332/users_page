<?php

class Model_Add_user extends Model
{

	/**
	 * get countries list from DB
	 * @return array
	 */
	public function get_countries()
	{
		return $this->select_all('user_city');
	}

	/**
	 * insert new user to DB
	 * @param $array
	 */
	public function insert_db($array)
	{
		$this->insert($array, 'users_list');
	}

}
