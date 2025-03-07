<?php

require_once '/app/config/mysql.php';


function findOneTitleByArticle(string $title): bool|array
{
    global $db;

    $sql = $db->prepare("SELECT * FROM articles WHERE title = :title");
    $sql->execute([
        'title' => $title
    ]);

    return $sql->fetch();
}

function createArticle(string $title, string $description): bool{
    global $db;

    try {
        $query = "INSERT INTO articles(title,description) VALUES (:title, :description)";

        $sql = $db->prepare($query);
        $sql->execute([
            'title' => $title,
            'description' => $description,
        ]);
    } catch (PDOException $e) {
        return false;
    }

    return true;
}