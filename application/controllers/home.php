<?php

class Home extends Controller
{

    function index()
    {
        $model = new HomeModel();
        $data = $model->getArticles();

        $view = new View;
        $view->render('home', 'template', $data);
    }

}