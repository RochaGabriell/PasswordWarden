<?php

require_once "app/models/Connection.php";

class PrivateDAO
{
    private $conn;

    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->getConnection();
    }

    public function getPrivates($fk_id_user)
    {
        $query = "SELECT * FROM privates WHERE fk_id_user = :fk_id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":fk_id_user", $fk_id_user);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPrivateByDescription($fk_id_user, $id_private)
    {
        $query = "SELECT * FROM privates WHERE fk_id_user = :fk_id_user AND id_private = :id_private";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":fk_id_user", $fk_id_user);
        $stmt->bindValue(":id_private", $id_private);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPrivateExists($fk_id_user, $description)
    {
        $query = "SELECT * FROM privates WHERE fk_id_user = :fk_id_user AND description = :description";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":fk_id_user", $fk_id_user);
        $stmt->bindValue(":description", $description);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPrivate($fk_id_user, $description, $user_or_email, $password)
    {
        $query = "INSERT INTO privates (fk_id_user, description, user_or_email, password) VALUES (:fk_id_user, :description, :user_or_email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":fk_id_user", $fk_id_user);
        $stmt->bindValue(":description", $description);
        $stmt->bindValue(":user_or_email", $user_or_email);
        $stmt->bindValue(":password", $password);

        return $stmt->execute();
    }

    public function updatePrivate($fk_id_user, $id_private, $description, $user_or_email, $password)
    {
        $query = "UPDATE privates SET description = :description, user_or_email = :user_or_email, password = :password WHERE fk_id_user = :fk_id_user AND id_private = :id_private";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":fk_id_user", $fk_id_user);
        $stmt->bindValue(":id_private", $id_private);
        $stmt->bindValue(":description", $description);
        $stmt->bindValue(":user_or_email", $user_or_email);
        $stmt->bindValue(":password", $password);

        return $stmt->execute();
    }

    public function deletePrivate($fk_id_user, $id_private)
    {
        $query = "DELETE FROM privates WHERE fk_id_user = :fk_id_user AND id_private = :id_private";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":fk_id_user", $fk_id_user);
        $stmt->bindValue(":id_private", $id_private);

        if ($stmt->execute()) {
            return $stmt->rowCount();
        } else {
            return 0;
        }
    }
}