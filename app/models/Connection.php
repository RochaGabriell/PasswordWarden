<?php

class Connection
{
    private $host = "localhost";
    private $username = "523871";
    private $password = "TFBudhdAr3pt4Dp";
    private $dbname = "523871";

    protected $conn;

    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão" . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}