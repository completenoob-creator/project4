<?php
include("./scripts/connect_db.php");
include("./scripts/functions.php");

$id = sanitize($_POST["id"]);
$pwh = sanitize($_POST["pwh"]);
$password = sanitize($_POST["password"]);
$passwordcheck = sanitize($_POST["passwordcheck"]);

if(empty($_POST["password"]) || empty($_POST["passwordcheck"])){
    header("Location: ./index.php?content=message&alert=geen-wachtwoord&id=$id&pwh=$pwh");
}else{
    
}

?>