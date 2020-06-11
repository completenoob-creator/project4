<?php
        if (isset($_GET['content'])) {
            if (strpos($_GET['content'], 'script') === false) {
                $filename = 'pagina/' . $_GET['content'] . '.php';
            } else {
                $filename = 'scripts/' . $_GET['content'] . '.php';
            }

            if (file_exists('pagina/' . $_GET['content'] . '.php')) {
                include 'pagina/' . $_GET['content'] . '.php';
            } 
        } else {
            include 'pagina/home.php';
        }
    ?>