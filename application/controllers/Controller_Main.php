<?
include_once ($_SERVER['DOCUMENT_ROOT'].'/application/modules/Module_Generator.php');

class Controller_Main
{

    private $Generator = null;

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        $this->Generator = new Module_Generator($this->view, $this->model);
    }

    function action_index()
    {
        $this->view->generate('index_view.php', 'template_view.php', $data);
    }

    function action_form()
    {
        $data = $this->model->get_data();

        // Задаем пустой пароль
        $data["password"] = "-";
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    function action_generate()
    {
        $data = $this->Generator->generate();

        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

}

?>