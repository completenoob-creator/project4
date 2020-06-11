<?php
$alert= (isset($_GET["alert"]))? $_GET["alert"]: "default";


switch($_GET["alert"]){
    case 'login-form-empty' :
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
                login formulier is leeg probeer het opnieuw
            </div>';
        header("Refresh: 3; url=./index.php?content=inloggen");
    break;
    case 'login-succes' :
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
               u bent ingelogt
            </div>';
        header("Refresh: 3; url=./index.php?content=home");
    break;
    case 'leeg' :
        echo '<div class="alert alert-primary w-50 mx-auto mt-5" role="alert">
              u bent vergeten iets intevullen
            </div>';
        header("Refresh: 3; url=./index.php?content=home");
    break;
}



?>