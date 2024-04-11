<?php
require("./config/database.php");

function getAllUsers($pdo)
{
    $statement = $pdo->query("SELECT * FROM users");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
