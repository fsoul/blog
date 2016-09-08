<?php

class Home extends Controller
{
    public $page;

    function __construct($data = null)
    {
        $this->page = $data;
    }

    function index()
    {
        $model = new HomeModel();
        $data = $model->getArticles($this->page);

        $view = new View();
        $view->render('home', 'template', $data);
    }

    function ajaxRequest()
    {

    }

}