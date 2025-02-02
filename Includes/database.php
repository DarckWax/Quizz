<?php

class Database {
    private static $instance = null;

    public static function getConnection() {
        if (self::$instance === null) {
            try {
                // Update the database name, username, and password as needed
                self::$instance = new PDO('mysql:host=localhost;dbname=projet_quizz', 'root', '');
            } catch (Exception $e) {
                die("Erreur de connexion à la bdd {$e->getMessage()}");
            }
        }
        return self::$instance;
    }
}
