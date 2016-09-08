<?php

class Helper
{
    public static function d($var, $debug = true)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if ($debug) die;
    }

    public static function mb_substr_replace($string, $replacement, $start, $length = null, $encoding = null)
    {
        if ($encoding == null) $encoding = mb_internal_encoding();
        if ($length == null) {
            return mb_substr($string, 0, $start, $encoding) . $replacement;
        } else {
            if ($length < 0) $length = mb_strlen($string, $encoding) - $start + $length;
            return
                mb_substr($string, 0, $start, $encoding) .
                $replacement .
                mb_substr($string, $start + $length, mb_strlen($string, $encoding), $encoding);
        }
    }
}