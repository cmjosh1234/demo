<?php
class Database {
    public $connection;
    public function __construct() { // this ensures that each time a new object is created, a connection to the database is automatically created for that object
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
        $this->connection = new PDO($dsn);
    }
    public function query($query){
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}