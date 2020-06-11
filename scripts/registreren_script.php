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

    $sql = "SELECT * FROM `register` WHERE `email` = '$email' AND WHERE `username` = '$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)){
        header("Location: ./index.php?content=message&alert=bestaat-all");
    }else{
        "INSERT INTO `inlog` 
                        (`id`, 
                        `username`, 
                        `email`, 
                        `wachtwoord`, 
                        `straatnaam`, 
                        `huisnummer`, 
                        `postcode`, 
                        `woonplaats`) 
                 VALUES (NULL, 
                        'hoi', 
                        'hoi', 
                        'hoi', 
                        'hoi', 
                        'hoi', 
                        'hoi', 
                        'hoi');";
    }

    header("Location: ./index.php?content=message&alert=register-success");
    }
?>