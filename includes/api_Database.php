<?php

include('config.php');

class Database
{
    // DB Params

    private $host = $databaseHost;
    private $db_name = $databaseName;
    private $username = $databaseUser;
    private $password = $databasePassword;
    private $conn;
    // DB Connect
    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
