<?php
include("./scripts/connect_db.php");
include("./scripts/functions.php");

$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);


if(empty($email) && empty($password)){
        //check of login velden zijn ingevuld
        header("Location: ./index.php?content=message&alert=login-form-empty");
    } else {
        $sql="SELECT * FROM `inlog` WHERE `email` = '$email'";
        
        $result= mysqli_query($conn,$sql);


        if (!mysqli_num_rows($result)){
            //email onbekend
            header("Location: ./index.php?content=message&alert=email-onbekend");
        }
        else{
            $record = mysqli_fetch_assoc($result);
            
            if(!$record["geactiveerd"]){
                //niet geactiveerd
                header("Location: ./index.php?content=message&alert=niet-geactiveerd&email=$email");
        }
        elseif(!password_verify($password,$record["wachtwoord"])){
            //geen match wachtwoord
            header("Location: ./index.php?content=message&alert=no-pw-match&email=$email");
    }
        }
}


?>