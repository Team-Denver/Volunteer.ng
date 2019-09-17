<?php
// used to get mysql database connection
class Database
{

    // specify your own database credentials
    private $host = "u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
    private $db_name = "yd5x8b3tkuiklz6v";
    private $username = "gi12c1gnyw2i8fhl";
    private $password = "rqw3ylfa8f4f94a1";
    public $conn;

    // get the database connection
    public function getConnection()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
