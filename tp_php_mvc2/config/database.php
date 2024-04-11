<?php

$dsn = "mysql:host=localhost;dbname=mvc_eboutique";
$username = "root";
$password = "root";
try {
    $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}