<?php 
// als er niets in het laatje zit dan ...
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
    //maakt de post arrays schoon
    $email = sanitize($_POST["email"]);
    $username = sanitize($_POST["username"]);
    $straatnaam = sanitize($_POST["straatnaam"]);
    $huisnummer = sanitize($_POST["huisnummer"]);
    $postcode = sanitize($_POST["postcode"]);
    $woonplaats = sanitize($_POST["woonplaats"]);
    //selecteert username en email uit de database
    $sql = "SELECT * FROM `inlog` WHERE `username`='$username' AND `email`='$email'";
    

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)){
        header("Location: ./index.php?content=message&alert=bestaat-all");
    }else{
      //password hash
        $password = "$2y$10$6bqIkEyrBNRXe7FUj3ClTcOSpLpUscTCGlAhreQ2UvYvJWU2kJgFJG";
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        //insert into inloggen
        $sql = "INSERT INTO `inlog` (`id`, `username`, `email`, `wachtwoord`, `geactiveerd`, `userrole`, `straatnaam`, `huisnummer`, `postcode`, `woonplaats`) VALUES (NULL, '$username', '$email', '$password_hash', '0', 'customer', '$straatnaam', '$huisnummer', '$postcode', '$woonplaats');";
       
     
     if (mysqli_query($conn, $sql)){
        // deze functie vraagt het id op uit de database.
        $id = mysqli_insert_id($conn);
        // Dit is het email die word verstuurd

        $to = $email;
        $subject = "Activatielink voor technostuff.com";
        $message = '<!doctype html>
        <html lang="en">
          <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <style>
            body {
                background-color: #6dfae4;
                font-size: 1.3m
            </style>
          </head>
          <body>
            <h2>Beste gebruiker,</h2>
            <p>U heeft zich onlang geregistreed op onze site technostuff.com</p>
          
            <p>klik <a href="http://www.technostuff.com/index.php?content=activate&id='. $id .'&pwh=' . $password_hash . '">hier</a> om je account te activeren en het wijzigen van je wachtwoord.</p>
            <p>Bedankt voor het registreren.</p>
            <p>Met vriendelijke groet,</p>
            <p class="">CEO technostuff.com</p>
        

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          </body>
        </html>';

date_default_timezone_set("Europe/Amsterdam");

        $headers = "MIM-Version 1.0\r\n";
        $headers .= "Content-type: text/html;charset-UTF-8\r\n";
        $headers .= "From: technostuff@gmail.org\r\n";
        $headers .= "Cc: \r\n";
        $headers .= "Bcc: \r\n";
        $headers .= "Date: " .date("d-m-Y-H:i:s");

        mail("$to", " $subject", "$message", "$headers");

        header("Location: ./index.php?content=message&alert=register-success");
    } else {
        header("Location: ./index.php?content=message&alert=register-error");
    }
}
}

   
?>