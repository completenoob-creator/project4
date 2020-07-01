<?php
include("./scripts/connect_db.php");
include("./scripts/functions.php");

$id = sanitize($_POST["id"]);
$pwh = sanitize($_POST["pwh"]);
$password = sanitize($_POST["password"]);
$passwordcheck = sanitize($_POST["passwordcheck"]);
//controle of alles ingevuld en gelijk is
if(empty($_POST["password"]) || empty($_POST["passwordcheck"])){
    header("Location: ./index.php?content=message&alert=geen-wachtwoord&id=$id&pwh=$pwh");
}elseif(strcmp($password,$passwordcheck)!=0){
    header("Location: ./index.php?content=message&alert=geen-match-wachtwoord&id=$id&pwh=$pwh");
}else{
    //het id uit de database halen
    $sql="SELECT * FROM `inlog` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)){
        $record = mysqli_fetch_assoc($result);
        //als hij al geactiveerd is krijg je een melding
        if($record["geactiveerd"]){
            header("Location: ./index.php?content=message&alert=al-geactiveerd");
        }
        else{
            //anders maakt hij een password-hash aan en update hij het wachtwoord
            if (!strcmp($record["wachtwoord"],$pwh)){
                $password_hash = password_hash($password,PASSWORD_BCRYPT);

                
                $sql="UPDATE `inlog`
                SET `wachtwoord` = '$password_hash',
                `geactiveerd` = 1
                WHERE `id` = $id AND `wachtwoord` = '$pwh'";

                if(mysqli_query($conn,$sql)){
                    header("Location: ./index.php?content=message&alert=update-succes");
                }else{
                    //als het niet lukt krijg je een melding
                    header("Location: ./index.php?content=message&alert=update-faal");
                }
            }else{
                //als de pwh niet klopt wordt je er ook vanaf gehaal
                header("Location: ./index.php?content=message&alert=no-match-pwh");
            }

        }
    }
}

?>