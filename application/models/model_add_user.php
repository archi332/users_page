<?php

class Model_Add_user extends Model
{
	
	public function get_countries()
	{
		$sql = 'SELECT * FROM `counries`';

		return $this->select($sql);
	}

}
