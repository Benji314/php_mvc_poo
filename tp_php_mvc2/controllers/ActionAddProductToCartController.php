<?php
session_start();
function safe(string $value) : string
{
    $valueSafe = htmlspecialchars(strip_tags(trim(stripslashes($value))));
    return $valueSafe;
}

function safeNumber(string $number, int $min, int $max ):string
{
    $numberSafe = safe($number);

    if(is_numeric($numberSafe) and $numberSafe>=$min and $numberSafe<=$max){
        return $numberSafe;
    }
    throw new Exception($number." est incohérent !");
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if(isset($_POST['product']) and !empty($_POST['product'])){
    $productToAdd = safeNumber($_POST['product'], 0, 3);
    if(isset($_SESSION['cart'][$productToAdd])) {
        $_SESSION['cart'][$productToAdd] += 1;
    } else {
        $_SESSION['cart'][$productToAdd] = 1;
    }
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
