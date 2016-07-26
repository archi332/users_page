<?php

class Model_Add_user extends Model
{

	/**
	 * @return array
	 */
	public function get_countries()
	{
		return $this->select_all('user_city');
	}

	/**
	 * @param $array
	 */
	public function insert_db($array)
	{
		$this->insert($array, 'users_list');
	}

}
