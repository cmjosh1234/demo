<?php 
    require "functions.php";
    //require "router.php";
    require "Database.php";

    /* This was the initial test of the DB connection before I refactored it to be a separate file 
    $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
    $pdo = new PDO($dsn);

    $statement = $pdo->prepare("SELECT * FROM posts");
    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach( $posts as $post){
        echo "<li>" . $post['title'] . "</li>";
    } */

    $db = new Database();
    $posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

    dd($posts);