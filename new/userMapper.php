<?php
require_once "databaseConfig.php";

class UserMapper extends DatabasePDOConfiguration
{

    private $db;
    private $query;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserByID($userId)
    {
        $this->query = "SELECT * from user where userid=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit(\SimpleUser $user, $id)
    {
        $this->query = "UPDATE user set username=:username, userLastName=:lastname where UserID=:id";
        var_dump($user);
        $statement = $this->conn->prepare($this->query);
        $username = $user->getUsername();
        $lastname = $user->getLastname();
        $statement->bindParam(":username", $username);
        $statement->bindParam(":lastname", $lastname);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function getUserByUsername($username)
    {
        $this->query = "SELECT * from user where username=:username";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":username", $username);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllUsers()
    {
        $this->query = "SELECT * from user";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertUser(\SimpleUser $user)
    {
        $this->query = "INSERT into User (userID, email, username, userpassword, role) values (:email,:username,:pass,:role)";
        $statement = $this->conn->prepare($this->query);
        $email = $user->getEmail();
        $username = $user->getUsername();
        $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        $role = $user->getRole();
        $statement->bindParam(":email", $email);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":pass", $password);
        $statement->bindParam(":role", $role);
        $statement->execute();
    }

    public function deleteUser($userId)
    {
        $this->query = "DELETE from user where userid=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->execute();
    }
}