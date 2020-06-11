<?php
include("./scripts/connect_db.php");
include("./scripts/functions.php");


$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);

if(empty($email) || empty($password)){
        //check of login velden zijn ingevuld
        header("Location: ./index.php?content=message&alert=login-form-empty");
    }
?>