<?php
namespace app;
use PDO;
const USER = "root";
const PASSWORD = "root";

final class DB
{
    private static $instance = null;
    private $connection = null;

    public static function getInstance(): DB
    {
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=project', USER, PASSWORD);
    }

    public static function connection(): PDO
    {
        return DB::getInstance()->connection;
    }

    public static function prepare($statement)
    {
        return DB::Connection()->prepare($statement);
    }

    private function __clone(){}
    private function __wakeup(){}
}