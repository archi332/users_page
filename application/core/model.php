<?php

class Model {

	/**
	 * @var PDO
	 */
	private $pdo = '';

	/**
	 * @var string $host
	 */
	private $host = 'localhost';

	/**
	 * @var string $dbname
	 */
	private $dbname = 'moo';

	/**
	 * @var string $name
	 */
	private $name = 'root';

	/**
	 * @var string $pass
	 */
	private $pass = '1111';

	/**
	 * @var string $error
	 */
	private $error = '';

	/**
	 * Model constructor.
	 * @connect to DataBase
	 */
	function __construct()
	{
		if (!is_object($this->pdo)){
			$this->connect_pdo();
		}
	}

	/**
	 * connect PDO
	 */
	private function connect_pdo()
	{
		try
		{
			$pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->name, $this->pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec('SET NAMES "utf8"');

			$this->setPdo($pdo);
		} catch(PDOException $e) {
			$this->error = 'can\'t connect to db';
			$this->db_err($this->error, $e);
			exit();
		}
	}

	/**
	 * execute sql query select
	 * @param $sql
	 * @return array
	 */
	protected function query($sql)
	{
		try {
			$data_array = $this->getPdo()->query($sql)->fetchAll();
			return $data_array;
		} catch (PDOException $e) {
			$this->error = 'can\'t connfirm query';
			$this->db_err($this->error, $e);
			exit();
		}
	}


	protected function select_all($table)
	{
        $sql = "SELECT * FROM $table";

		try {
			$data_array = $this->getPdo()->query($sql)->fetchAll();
			return $data_array;
		} catch (PDOException $e) {
			$this->error = 'can\'t connfirm query';
			$this->db_err($this->error, $e);
			exit();
		}
	}




	/**
	 * prepare data
	 * @param $allowed
	 * @param $values
	 * @param array $source
	 * @return string
	 */
	function pdoSet($allowed, &$values, $source = array())
	{
		$set = '';
		$values = array();
		if (!$source) $source = &$_POST;
		foreach ($allowed as $field) {
			if (isset($source[$field])) {
				$set.="`".str_replace("`","``",$field)."`". "=:$field, ";
				$values[$field] = $source[$field];
			}
		}
		return substr($set, 0, -2);
	}

	/**
	 * @param $array
	 * @param $table
	 */
	protected function insert($array, $table)
	{
		foreach($array as $key => $value){
			$allowed[] = $key;
			$values[] = $value;
		}

		$sql = "INSERT INTO $table SET " . $this->pdoSet($allowed,$values, $array);

		$stm = $this->getPdo()->prepare($sql);

		$stm->execute($values);
	}


	/**
	 * @param $error
	 * @param $err_arr
	 */
	function db_err($error, $err_arr)
	{
		$result = '<h1>ERROR!</h1>';
		$result .= "<p>$error</p>";
		echo $result . '<pre>';
		print_r($err_arr);
	}

	/**
	 * @return PDO
	 */
	private function getPdo()
	{
		return $this->pdo;
	}

	/**
	 * @param PDO $pdo
	 */
	private function setPdo($pdo)
	{
		$this->pdo = $pdo;
	}

}