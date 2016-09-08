<?php

class Error404 extends Controller
{
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function index()
    {
        $this->view->render('error404', 'template');
    }

}