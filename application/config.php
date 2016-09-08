<?php

define ('DS', DIRECTORY_SEPARATOR);
$appPath = realpath(dirname(__FILE__)). DS;
define ('APP_PATH', $appPath);
define('DB_CONFIG_PATH', $appPath . 'database.php');
define('IMG_PATH', $_SERVER['DOCUMENT_ROOT'] . '/images/');

require_once 'database.php';