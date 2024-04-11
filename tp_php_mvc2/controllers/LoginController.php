<?php
session_start();

ob_start();
require("../views/login.php");
$body = ob_get_clean();

require("../layouts/layout.php");