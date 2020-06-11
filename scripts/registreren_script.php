<?php // als er niets in het laatje zit dan ...

if(empty($_POST["email"]) 
&& empty($_POST["username"]) 
&& empty($_POST["straatnaam"]) 
&& empty($_POST["huisnummer"])
&& empty($_POST["postcode"])
&& empty($_POST["woonplaats"])){
    header("Location: ./index.php?content=message&alert=leeg");
}else {
    //maak contact met de mysql server
    include("./scripts/connect_db.php");
    include("./scripts/functions.php");

    $email = sanitize($_POST["email"]);
    $username = sanitize($_POST["username"]);
    $straatnaam = sanitize($_POST["straatnaam"]);
    $huisnummer = sanitize($_POST["huisnummer"]);
    $postcode = sanitize($_POST["postcode"]);
    $woonplaats = sanitize($_POST["woonplaats"]);

    $sql = "SELECT * FROM `inlog` WHERE `username`='$username' AND `email`='$email'";
    

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)){
        header("Location: ./index.php?content=message&alert=bestaat-all");
    }else{
        $array = mk_password_hash_from_microtime();

        $sql = "INSERT INTO `inlog` (`id`, `username`, `email`, `wachtwoord`, `straatnaam`, `huisnummer`, `postcode`, `woonplaats`) VALUES (NULL, '$username', '$email', '{$array["password_hash"]}', '$straatnaam', '$huisnummer', '$postcode', '$woonplaats');";
       
        $result = mysqli_query($conn, $sql);
     header("Location: ./index.php?content=message&alert=register-success");                  
    }

    
    }
?>