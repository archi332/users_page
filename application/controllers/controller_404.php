<?php

class Controller_404 extends Controller
{

	/**
	 * view 404 page
	 */
	function action_index()
	{
		$this->view->generate('404_view.php', 'template_view.php');
	}

}
