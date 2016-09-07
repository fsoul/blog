<?php

class Helper
{
    public static function d($var, $die = null)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if($die) die;
    }
}