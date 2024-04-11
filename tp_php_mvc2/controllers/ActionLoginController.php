<?php
session_start();
require("../config/database.php");

function safe(string $value) : string
{
    $valueSafe = htmlspecialchars(strip_tags(trim(stripslashes($value))));
    return $valueSafe;
}

if(isset($_POST['password']) and !empty($_POST['password'])){
    $userPassword = safe($_POST['password']);
}

if(isset($_POST['email']) and !empty($_POST['email'])){
    $email = safe($_POST['email']);
}

function isLoginValid(string $userPassword, string $hash):bool
{
    return password_verify($userPassword, $hash);
}

$sqlQuery = /** @lang MySQL */
    "SELECT * FROM users WHERE email = :email";

$statement = $pdo->prepare($sqlQuery);
$statement->bindParam(':email', $email);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (isLoginValid($userPassword, $user['user_password'])){
    $_SESSION['login'] = 'success';
    $_SESSION['user'] = $user;

}else{
    $user = [];
    $_SESSION['login'] = 'error';
    $_SESSION['user'] = $user;
}

header('Location: ' . "/controllers/HomepageController.php");
exit;