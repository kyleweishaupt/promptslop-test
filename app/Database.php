<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $config = require 'config/database.php';
        $dsn = 'sqlite:' . $config['database'];
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('PRAGMA synchronous = FULL;');
        $this->pdo->exec('PRAGMA journal_mode = DELETE;');
        $this->pdo->exec('PRAGMA foreign_keys = ON;');
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}