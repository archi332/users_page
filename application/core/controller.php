<?php

class Controller {

	public $view;

	/**
	 * Controller constructor.
	 */
	function __construct()
	{
		$this->view = new View();
	}

	/**
	 * load library class
	 * @param $library_name
	 */
	function library($library_name)
	{
		$path_lib =  $library_name . '.php';

		include "application/libraries/".$path_lib;

		$this->$library_name = new $library_name();

	}
}
