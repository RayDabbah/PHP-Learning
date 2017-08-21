<?php
class Query
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function selectAll($table, $class)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function delete($table, $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM $table WHERE id=$id");
        $statement->execute();
    }
    public function addUser($table, $username, $email, $password)
    {
        $statement = $this->pdo->prepare("INSERT INTO $table (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');");
        $statement->execute();
    }
    public function addTask($table, $description, $completed)
    {
        $statement = $this->pdo->prepare("INSERT INTO $table (`description`, `completed`) VALUES ('$description', '$completed');");
        $statement->execute();
    }
    public function updateTask($table, $description, $completed, $id)
    {
        $statement = $this->pdo->prepare("UPDATE $table SET description='$description', completed='$completed' WHERE id=$id;");
        $statement->execute();
    }
}