<?php

class Controller_add_user extends Controller {


	/**
	 * Controller_add_user constructor.
	 */
	function __construct()
	{
		$this->model = new Model_Add_user();
		$this->view = new View();
	}

	/**
	 * @param null $add_data additional data
	 * @param int $key_data key of array with additional data
	 */
	function action_index($add_data = null, $key_data = 0)
	{
		$data['countries'] = $this->model->get_countries();
		$data[$key_data] = ($add_data !== null) ? $add_data : null;
		$this->view->generate('add_user_view.php', 'template_view.php', $data);
	}


	/**
	 *
	 */
	function action_check()
	{
		$this->library('validation');

		$errors = $this->validation->check_valid($this->validatation_rules());
		$errors_img = $this->validation->check_valid_img($this->img_validation_rules());

		if (is_array($errors_img) && is_array($errors)){
			$errors = array_merge($errors, $errors_img);
		} elseif (is_array($errors_img)){
			$errors = $errors_img;
		} elseif (is_array($errors)){
			$errors = $errors;
		}

		if ($errors) {
			$this->action_index($errors, 'errors');
		} else {
			//@TODO: connect to database and add new user

			$this->library('upload');

			$file_name = date('Ymd') . '_' . $_FILES['foto_name']['name'];

			$this->upload->upload_file($file_name);

			$array = $_POST;
			$array['foto_name'] = $file_name;

			$this->model->insert_db($array);

			header('Location:http://' . $_SERVER['HTTP_HOST']);

		}

	}

	/**
	 * @return array
	 */
	function validatation_rules()
	{
		$val_rules = array(
				'email' => [
						'field_name' => 'Электонная почта',
						'precision' => true,
						'valid_email' => true],
				'first_name' => [
						'field_name' => 'Имя пользователя',
						'precision' => true,
						'max_length' => 15,
						'min_length' => 5],
				'sec_name' => [
						'field_name' => 'Фамилия пользователя',
						'precision' => true,
						'max_length' => 15,
						'min_length' => 5],
				'country_id' => [
						'field_name' => 'Страна',
						'precision' => true,
						'max_length' => 3,
						'numeric' => true ],
				'date_b' => [
						'field_name' => 'День рождения',
						'precision' => true,
						'valid_date' => true,
						'max_date' => '2011-06-04'],
				'post_index' => [
						'field_name' => 'Почтовый индекс',
						'precision' => true,
						'max_length' => 10,
						'min_length' => 3,
						'numeric' => true ]
		);
		return $val_rules;
	}

	/**
	 * @return array
	 */
	function img_validation_rules()
	{
		$val_rules = array(
				'name' => [
						'field_name' => 'Изображение профиля',
						'type_img' => 'jpg/png/gif' ],
				'size' =>[
						'field_name' => 'Изображение профиля',
						'max_file_size' => '512'
				]
		);
		return $val_rules;

	}


}
