<?php
session_start();

require("../models/Product.php");
$products = getAllProducts();

ob_start();
require("../views/products.php");
$body = ob_get_clean();

$title="Liste des produits";
require("../layouts/layout.php");