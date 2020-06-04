<?php
        if (isset($_GET['content'])) {
            if (file_exists('pagina/' . $_GET['content'] . '.php')) {
                include 'pagina/' . $_GET['content'] . '.php';
            } 
        } else {
            include 'pagina/home.php';
        }
    ?>