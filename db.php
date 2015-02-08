<?php

class DBmodel
{
    private static $instance = NULL;
    private static $host = 'localhost';
    private static $dbname = 'frfeed';
    private static $pass = '13';
    private static $user = 'root';
    private function __construct()
    {
    }
    private function __clone()
    {
    }
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname, self::$user, self::$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            self::$instance-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
