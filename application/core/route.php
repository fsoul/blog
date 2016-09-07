<?php

/**
 * Created by PhpStorm.
 * User: fsoul
 * Date: 05.09.2016
 * Time: 14:21
 */
class Route
{

    public static function start()
    {
        $url = $_GET['route'];
        $urlArr = explode('/', $url);

        if (!empty($urlArr[0])) {
            $controllerName = strtolower($urlArr[0]);
        } else {
            $controllerName = 'home';
        }

        $modelName = $controllerName . 'Model.php';
        $modelPath = 'application/models/' . $modelName;
        if (file_exists($modelPath)) {
            include $modelPath;
        }

        $controllerPath = 'application/controllers/' . $controllerName . '.php';
        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            Route::ErrorPage404();
        }

        if (!empty($urlArr[1])) {
            $action = strtolower($urlArr[1]);
        } else {
            $action = 'index';
        }

        if (!empty($urlArr[2])) {
            $id = $urlArr[2];
        }

        $controller = new $controllerName;
        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }


    }

    public static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'Error404');
    }
}