<?php
/**
 * Database Configuration for JOKEBURG
 * MySQL/MariaDB configuration for PHPMyAdmin compatibility
 */

class Database {
    private $host = 'localhost';
    private $db_name = 'jokeburg_db';
    private $username = 'root';
    private $password = '';
    private $port = 3306;
    private $charset = 'utf8mb4';
    
    public $conn;
    
    public function __construct() {
        // Load from environment if available
        $this->host = $_ENV['DB_HOST'] ?? $this->host;
        $this->db_name = $_ENV['DB_NAME'] ?? $this->db_name;
        $this->username = $_ENV['DB_USER'] ?? $this->username;
        $this->password = $_ENV['DB_PASS'] ?? $this->password;
        $this->port = $_ENV['DB_PORT'] ?? $this->port;
    }
    
    public function getConnection() {
        $this->conn = null;
        
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=" . $this->charset;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $exception) {
            $error_message = "Database connection error: " . $exception->getMessage();
            error_log($error_message);
            
            // Show user-friendly message
            if (function_exists('logError')) {
                logError($error_message, [
                    'host' => $this->host,
                    'database' => $this->db_name,
                    'port' => $this->port
                ]);
            }
            
            // In production, don't show detailed error to users
            if (ini_get('display_errors')) {
                echo "Connection error: " . $exception->getMessage();
            } else {
                echo "Database connection failed. Please contact administrator.";
            }
        }
        
        return $this->conn;
    }
    
    public function closeConnection() {
        $this->conn = null;
    }
}
?>