<?php

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

        if (!empty($urlArr[2]) and (intval($urlArr[2]) > 0)) {
            $data = intval($urlArr[2]);
        } else {
            $data = null;
        }

        $controller = new $controllerName($data);

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    public static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'error404');
    }

}