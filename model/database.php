<?php

$pdo = null;
$host = 'localhost';
$user = 'root';
$password = '';
$bd = 'helheim';

class Database
{
    public static function StartUp()
    {
        try {
            $GLOBALS['pdo'] = new PDO("mysql:host=" . $GLOBALS['host'] . ";dbname=" . $GLOBALS['bd'] . "", $GLOBALS['user'], $GLOBALS['password']);
            $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $GLOBALS['pdo'];
        } catch (PDOException $e) {
            print "Oops... No se ha podido establecer conexión a la base de dato" . $GLOBALS['bd'] . "<br>";
            print "Más información" . $e . "<br>";
        }
    }

    static function disconnect()
    {
        $GLOBALS['pdo'] = null;
    }

    /* public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=helheim;charset=utf8mb4', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } */
}
