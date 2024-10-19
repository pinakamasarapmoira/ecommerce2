<?php

class DatabaseConnect {
    private $host = "localhost";
    private $database = "ecommerce";
    private $dbusername = "root";
    private $dbpassword = "";

    public function connectDB() {
        $dsn = "mysql:host=$this->host;dbname=$this->database;";

        try {
            $conn = new PDO($dsn, $this->dbusername, $this->dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; // Return the connection object
        } catch (Exception $e) {
            echo "Connection Failed: " . $e->getMessage();
            return null; // Return null on failure
        }
    }
}

?>