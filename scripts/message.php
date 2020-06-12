<?php $alert=(isset($_GET["alert"]))? $_GET["alert"]: "default";
$email=(isset($_GET["email"]))? $_GET["email"]: "";



switch($_GET["alert"]) {
    case 'login-form-empty':
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
login formulier is leeg probeer het opnieuw </div>';
header("Refresh: 3; url=./index.php?content=inloggen");
    break;
    case 'email-onbekend':
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
dit email is onbekend in de database registreer u </div>';
header("Refresh: 3; url=./index.php?content=registreren");
    break;
    case 'login-succes':
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
u bent ingelogt </div>';
header("Refresh: 3; url=./index.php?content=home");
    break;
    case 'leeg':
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
u bent vergeten iets intevullen </div>';
header("Refresh: 3; url=./index.php?content=registreren");
    break;
    case 'niet-geactiveerd':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
U acount is nog niet geactiveerd. check uw email ' .$email. 'voor het klikken op de activatielink </div>';
header("Refresh: 3; url=./index.php?content=inloggen");
    break;
    case 'no-pw-match':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
U ingevulde wachtwoord voor dit emailadres ' .$email. 'is niet correct, probeer het opnieuw. </div>';
header("Refresh: 3; url=./index.php?content=inloggen");
    break;
    case 'register-success':
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
registrer succesvol </div>';
header("Refresh: 3; url=./index.php?content=home");
    break;
    case 'bestaat-all':
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
de email of username is al in gebruik </div>';
header("Refresh: 3; url=./index.php?content=home");
    break;
    case 'hacker-alert':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
        U heeft geen rechten u wordt doorgestuurd naar home
    </div>';
    header("Refresh: 3; url=./index.php?content=home");
    break;
    case 'geen-wachtwoord':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
        U heeft een van beide wachtwoord velden niet ingevuld probeer het opnieuw
    </div>';
    header("Refresh: 3; url=./index.php?content=activate&id=$id&pwh=$pwh");
    break;
    case 'geen-match-wachtwoord':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
        U heeft niet hetzelfde wachtwoord ingevoerd probeer het opnieuw.
    </div>';
    header("Refresh: 3; url=./index.php?content=activate&id=$id&pwh=$pwh");
    case 'al-geactiveerd':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
         dit account is al geactiveerd, log in.
    </div>';
    header("Refresh: 3; url=./index.php?content=inloggen");
    break;
    case 'update-succes':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
         het updaten van u wachtwoord is geslaagd u wordt doorgestuurd naar de inlogpagina.
    </div>';
    break;
    header("Refresh: 3; url=./index.php?content=inloggen");
    case 'update-faal':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" role="alert">
        Het registratieproces is niet gelukt kies een niew wachtwoord
    </div>';
    header("Refresh: 3; url=./index.php?content=activate&id=$id&pwh=$pwh");
    break;
    case 'no-match-pwh':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5" text-center role="alert">
        U activatielink gegevens zijn niet correct, registreer opnieuw
    </div>';
    header("Refresh: 3; url=./index.php?content=registreer");
    break;
    
}



?>