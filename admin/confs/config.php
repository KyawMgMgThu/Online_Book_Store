<?php

class DB
{
    public static $pdo;

    public static function connect()
    {
        try {
            $dbhost = "localhost";
            $dbuser = "kyawmgmgthu";
            $dbpass = "kyawmgmgthu789";
            $dbname = "Online_Book_Store";

            $pdo = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo = $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
