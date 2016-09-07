<?php

class Db
{
    private $dbHandler;
    private static $_instance = null;

    private function __construct()
    {
        try {
            $this->dbHandler = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance->dbHandler;
    }

    private function __wakeup()
    {
    }

    protected function __clone()
    {
    }
}