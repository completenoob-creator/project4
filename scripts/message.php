<?php
$alert= (isset($_GET["alert"]))? $_GET["alert"]: "default";
$email = (isset($_GET["email"]))? $_GET["email"]: "";



switch($_GET["alert"]){
    case 'login-form-empty' :
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
                login formulier is leeg probeer het opnieuw
            </div>';
        header("Refresh: 3; url=./index.php?content=inloggen");
    break;
    case 'email-onbekend' :
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
                 dit email is onbekend in de database registreer u
            </div>';
        header("Refresh: 3; url=./index.php?content=registreren");
    break;
    case 'niet-geactiveerd':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
        U acount is nog niet geactiveerd. check uw email ' .$email. ' voor het klikken op de activatielink
    </div>';
    header("Refresh: 3; url=./index.php?content=inloggen");
    break;
    case 'no-pw-match':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
        U ingevulde wachtwoord voor dit emailadres ' .$email. ' is niet correct,probeer het opnieuw.
    </div>';
    header("Refresh: 3; url=./index.php?content=inloggen");
    break;
}



?>