<?php

define ('DS', DIRECTORY_SEPARATOR);
$appPath = realpath(dirname(__FILE__)). DS;
define ('APP_PATH', $appPath);
define('DB_CONFIG_PATH', $appPath . 'database.php');

require_once 'database.php';