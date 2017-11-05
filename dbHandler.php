<?php

/* Credit: Bjarte K. Larsen :) */
class Database {
    private static $connection = false;
    public static function instance() {
        global $config;
        if(!self::$connection) {
            self::$connection = new PDO('mysql:host=127.0.0.1;dbname=db_oblig5;charset=utf8mb4', 'root', 'root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$connection;
    }
}
