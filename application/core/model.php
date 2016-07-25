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
	function connect_pdo()
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
	function select($sql)
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
	public function getPdo()
	{
		return $this->pdo;
	}

	/**
	 * @param PDO $pdo
	 */
	public function setPdo($pdo)
	{
		$this->pdo = $pdo;
	}

}