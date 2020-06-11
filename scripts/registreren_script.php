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
    include("./pagina's/connect_db.php");
    include("./pagina's/functions.php");

    $email=sanitize($_POST["email"]);
    }
?>