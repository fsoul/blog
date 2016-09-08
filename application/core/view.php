<?php

class View
{

    function render($contentView, $templateView, $data = null)
    {
        include 'application/views/' . $templateView . '.php';
    }
}