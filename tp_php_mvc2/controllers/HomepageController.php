<?php
session_start();
ob_start();
require("../views/index.php");
$body = ob_get_clean();
$title="Accueil";
require("../layouts/layout.php");
