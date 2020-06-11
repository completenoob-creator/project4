<?php
include("./scripts/connect_db.php");
include("./scripts/functions.php");


$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);


?>