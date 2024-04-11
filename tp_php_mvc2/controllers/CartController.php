<?php
session_start();

ob_start();
require("../views/carts.php");
$body = ob_get_clean();

$title="Mon panier";
require("../layouts/layout.php");
