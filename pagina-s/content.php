<?php
   
        if (isset($_GET['content'])) {
            if (file_exists('pagina/' . $_GET['content'] . '.php')) {
                include 'pagina/' . $_GET['content'] . '.php';
            } 
            elseif(file_exists('scripts/' . $_GET['content'] . '.php')){
                include 'scripts/' . $_GET['content'] . '.php';
            }elseif(file_exists('pagina-a/' . $_GET['content'] . '.php')){
                include 'pagina-a/' . $_GET['content'] . '.php';
            }
            elseif(file_exists('pagina-r/' . $_GET['content'] . '.php')){
                include 'pagina-r/' . $_GET['content'] . '.php';
            }
        }
           
    ?>


<!-- if (isset($_GET['content'])) {
if (strpos($_GET['content'], 'script') === false) {
    $filename = 'pagina/' . $_GET['content'] . '.php';
} else {
    $filename = 'scripts/' . $_GET['content'] . '.php';
}
} -->