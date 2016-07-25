<?php

class Model_Add_user extends Model
{

	/**
	 * @return array
	 */
	public function get_countries()
	{
		$sql = 'SELECT * FROM `counries`';

		return $this->select($sql);
	}

	/**
	 * @param $array
	 */
	public function insert_db($array)
	{
		$this->insert($array, 'users_list');
	}

}
