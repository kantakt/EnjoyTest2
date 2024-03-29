<?

class Route
{
    static function start()
    {
           // Контроллер и действие по умолчанию
            $controller_name = 'Main';
            $action_name = 'index';

            // Получаем массив из пути
            $routes = explode('/', $_SERVER['REQUEST_URI']);

            // 1-й параметр - имя контроллера
            if ( !empty($routes[1]) )
            {
                $controller_name = $routes[1];
            }

            //  2-й action
            if ( !empty($routes[2]) )
            {
                $action_name = $routes[2];
            }

            // Генерация имени фала модели, контроллера и действия
            $model_name = 'Model_'.$controller_name;
            $controller_name = 'Controller_'.$controller_name;
            $action_name = 'action_'.$action_name;

            // подцепляем файл с классом модели (файла модели может и не быть)

            $model_file = strtolower($model_name).'.php';
            $model_path = "application/models/".$model_file;
            if(file_exists($model_path))
            {
                include "application/models/".$model_file;
            }

            // подцепляем файл с классом контроллера
            $controller_file = strtolower($controller_name).'.php';
            $controller_path = "application/controllers/".$controller_file;
            if(file_exists($controller_path))
            {
                include "application/controllers/".$controller_file;
            }
            else
            {
                throw new baseException("Page not Found - 404");
                Route::ErrorPage404();
            }

            // создаем контроллер
            $controller = new $controller_name;
            $action = $action_name;

            if(method_exists($controller, $action))
            {
            // вызываем действие контроллера
                $controller->$action();
            }
            else
            {
            // здесь также разумнее было бы кинуть исключение
                Route::ErrorPage404();
            }

            }

            function ErrorPage404()
            {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
            }
    }

?>