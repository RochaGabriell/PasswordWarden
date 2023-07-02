<?php
require_once "Connection.php";

class AuthDAO
{
    private $conn;

    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->getConnection();
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserAllEmails($email)
    {
        $query = "SELECT email FROM users WHERE email != :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $email, $password)
    {
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $password);

        return $stmt->execute();
    }

    public function updateUser($username, $email, $password, $id_user)
    {
        $query = "UPDATE users SET username = :username, email = :email, password = :password WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $password);
        $stmt->bindValue(":id_user", $id_user);

        return $stmt->execute();
    }
}