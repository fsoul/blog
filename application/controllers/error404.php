<?php

class Error404 extends Controller{

    function index(){
        $view = new View();
        $view->render('error404', 'Template');
    }
}