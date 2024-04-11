<?php

function getAllProducts()
{
    require("../config/database.php");
    $statement = $pdo->query("SELECT * FROM products");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}