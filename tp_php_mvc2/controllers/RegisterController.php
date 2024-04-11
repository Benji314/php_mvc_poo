<?php
ob_start();
require("../views/register.php");
$body = ob_get_clean();

require("../layouts/layout.php");

