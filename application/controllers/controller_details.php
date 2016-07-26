<?php

class controller_details extends Controller
{
    /**
     * controller_details constructor.
     */
    function __construct()
    {
        $this->model = new Model_Details();
        $this->view = new View();
    }

    function action_index()
    {
        $id = $_GET['user'];

        $this->check_data($id);

        $data = $this->model->get_cur_user($id);
        $data = $data['0'];

        $this->view->generate('details_view.php', 'template_view.php', $data);
    }

    /**
     * check id in _GET request which sending to DB
     * @param $id
     */
    private function check_data($id)
    {
        if (!is_numeric($id) || $id = '' || strlen($id) > 3){
            Route::ErrorPage404();
        }
    }
}