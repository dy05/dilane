<?php
session_start();
const SITE_URL = 'http://localhost:4000';

class App {
    private static $pdo = null;
    private static $host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    private static $db_name = 'pharmaceutical';

    public static function redirectIfNotConnect()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . SITE_URL . '/login.php');
        }
    }

    public static function redirectIfConnect()
    {
        if (isset($_SESSION['user'])) {
            header('Location: ' . SITE_URL . '/index.php');
        }
    }

    public static function getPDO()
    {
        if (static::$pdo) {
            return static::$pdo;
        }

        try {
            $pdo = new PDO("mysql:host=" . static::$host . ";dbname=" . static::$db_name, static::$db_user, static::$db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
//            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);;
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);;
            static::$pdo = $pdo;
            return $pdo;
        } catch (Exception $exc) {
//            die($exc->getMessage());
            die("Connexion error");
        }
    }
}
