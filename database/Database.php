<?php
include('../config/Config.php');

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Load database configuration from file
        
        // Create PDO connection
		$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->connection = new PDO($dsn, DB_USER, DB_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
