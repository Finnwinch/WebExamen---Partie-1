<?php

class DatabaseHelper {
    private static PDO|null $instance;
    private static string $pathProject = "/var/www/html" ;
    private function __construct() {}

    public static function connection() : PDO | null {
        try {
            return self::$instance ?? new PDO("sqlite:" . self::$pathProject . "/model/dao/database.db");
        } catch(Exception $e) {
            echo "La connexion à la base de données a échoué.";
            die();
        }
    }

    public static function disconnection() : void {
        self::$instance = null;
    }
}