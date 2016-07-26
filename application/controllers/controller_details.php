<?php

/**
 * Created by PhpStorm.
 * User: stk
 * Date: 26.07.16
 * Time: 18:32
 */
class controller_details extends Controller
{



    function __construct()
    {
        $this->model = new Model_Details();
        $this->view = new View();
    }


    function action_index()
    {
        $data = $this->model->get_cur_user($_GET['user']);
        $data = $data['0'];

        $this->view->generate('details_view.php', 'template_view.php', $data);
    }

}