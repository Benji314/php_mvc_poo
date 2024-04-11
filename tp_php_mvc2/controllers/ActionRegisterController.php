<?php

require_once("../config/database.php");

function safe(string $value) : string
{
    $valueSafe = htmlspecialchars(strip_tags(trim(stripslashes($value))));
    return $valueSafe;
}

function safeText(string $text, int $min, int $max) :string
{
    $valueSafe = safe($text);
    $valueTruncated = mb_substr($valueSafe, 0, $max);

    if (strlen($valueTruncated)<$min or !preg_match('/^[\p{L}\s-]+$/u',$valueTruncated)){
        throw new Exception($valueTruncated."trop court ou incohérent!");
    }
    return $valueTruncated;
}

function safeTel(string $phone) :?string
{
    $valueSafe = safe($phone);
    if (preg_match('/^\d{10}$/', $valueSafe)) {
        return $phone;
    } else {
        throw new Exception($phone . " n'est pas un numéro de téléphone valide !");
    }
}

function validateDate($date, $format = 'Y-m-d'): bool
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function isOver18(string $dateOfBirth): bool
{
    $date = new DateTime($dateOfBirth);
    $now = new DateTime();
    $age = $date->diff($now)->y;

    return $age >= 18;
}

function safeDate(string $date): string
{
    $dateSafe = safe($date);
    if (validateDate($dateSafe) and isOver18($dateSafe)){
        return $dateSafe;
    }
    throw new Exception($date."n'est pas un format de date valide ou il faut avoir + 18ANS !");
}

function safeGender(string $gender):string
{
    $genderSafe=safe($gender);
    if($genderSafe === "male" or $genderSafe==="female"){
        return $genderSafe;
    }
    throw new Exception($gender."n'est pas un genre !");
}

function safeNumber(string $number, int $min, int $max ):string
{
    $numberSafe = safe($number);

    if(is_numeric($numberSafe) and $numberSafe>=$min and $numberSafe<=$max){
        return $numberSafe;
    }
    throw new Exception($number." est incohérent !");

}

function safePassword(string $password, string $rePassword): string
{
    if($password === $rePassword and strlen($password)<255){
        return password_hash($password, PASSWORD_DEFAULT);
    }else{
        throw new Exception("Les mots de passes ne correspondent pas !");
    }
}

if(isset($_POST['firstname']) and !empty($_POST['firstname'])){
    $firstname = safeText($_POST['firstname'], 0, 50);
}

if(isset($_POST['lastname']) and !empty($_POST['lastname'])){
    $lastname = safeText($_POST['lastname'], 0, 50);
}

if(isset($_POST['phone']) and !empty($_POST['phone'])){
    $phone = safeTel($_POST['phone']);
}

if(isset($_POST['birthday']) and !empty($_POST['birthday'])){
    $birthday = safeDate($_POST['birthday']);
}

if(isset($_POST['gender']) and !empty($_POST['gender'])){
    $gender = safeGender($_POST['gender']);
}

if(isset($_POST['roadNumber']) and !empty($_POST['roadNumber'])){
    $roadNumber = safeNumber($_POST['roadNumber'],0 , 999999);
}

if(isset($_POST['address']) and !empty($_POST['address'])){
    $address = safeText($_POST['address'], 0, 255);
}

if(isset($_POST['zipcode']) and !empty($_POST['zipcode'])){
    $zipcode = safeNumber($_POST['zipcode'], 0, 999999);
}

if(isset($_POST['city']) and !empty($_POST['city'])){
    $city = safeText($_POST['city'],0,100);
}

if(isset($_POST['password']) and !empty($_POST['password'])){
    $userPassword = safePassword($_POST['password'],$_POST['rePassword']);
}

function safeAndUniqueEmail(string $email, $pdo):string
{
    $emailSafe=safe($email);

    if (!is_null(filter_var($emailSafe,FILTER_VALIDATE_EMAIL,  FILTER_NULL_ON_FAILURE)) and
        strlen($emailSafe)<255 and is_emailUnique($emailSafe, $pdo))
    {
        return $emailSafe;
    }
    throw new Exception($email."n est pas un email valide.");
}

function is_emailUnique(string $emailSafe, $pdo):bool
{
    $sqlQuery = /** @lang MySQL */
        "SELECT COUNT(*) FROM `users` WHERE email=:email ";
    $statement = $pdo->prepare($sqlQuery);
    $statement->bindParam(':email', $emailSafe);
    $statement->execute();
    $countUsers = $statement->fetchColumn();

    var_dump($countUsers);

    if ($countUsers==="0"){
        return true;
    }else{
        throw new Exception("Cet email existe déjà");
    }

}

if(isset($_POST['email']) and !empty($_POST['email'])){
    $email = safeAndUniqueEmail($_POST['email'],$pdo);
}

$sqlQuery = /** @lang MySQL */
    "INSERT INTO `users` 
        (firstname, lastname,phone ,birthday, gender , road_number, address, zipcode,
         city, email, user_password) 
    VALUES 
        (:firstname, :lastname,:phone, :birthday, :gender, :road_number, :address, :zipcode,
         :city, :email, :user_password)  ";

$statement = $pdo->prepare($sqlQuery);
$statement->bindParam(':firstname',$firstname);
$statement->bindParam(':lastname',$lastname);
$statement->bindParam(':phone', $phone);
$statement->bindParam(':birthday', $birthday);
$statement->bindParam(':gender', $gender);
$statement->bindParam(':road_number', $roadNumber);
$statement->bindParam(':address', $address);
$statement->bindParam(':zipcode', $zipcode);
$statement->bindParam(':city', $city);
$statement->bindParam(':email', $email);
$statement->bindParam(':user_password', $userPassword);
$statement->execute();

session_start();
$_SESSION['register'] = 'success';

header('Location: ' . "/controllers/LoginController.php");
exit;