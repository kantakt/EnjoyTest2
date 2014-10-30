<?
class Controller_404
{
    function __construct()
    {
       // $this->model = new Model_Main();
        $this->view = new View();

    }

    function action_index()
    {
        $this->view->generate('404_view.php', 'template_view.php', $data);
    }



}



?>