<?php session_start(); session_gc(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php?content=home"><img src="./icon/logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="col-4">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            producten/informatie
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./index.php?content=producten1">producten</a>
            <a class="dropdown-item" href="./index.php?content=informatie">informatie</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-6">
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php 
      //kijkt of er een id is en zoja wat voor userrole deze persoon heeft 
          if (isset($_SESSION["id"])) {
            switch($_SESSION["userrole"]){
              case 'admin' :
                echo '<ul><li class="nav-item '; echo '">
                <a class="nav-link" href="./index.php?content=admin">admin</a>
              </li></ul>';
              break;
            }
          }
      ?>
    </div>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <div class="col-1">
      <?php
      if (isset($_SESSION["id"])) {
        echo '<li class="nav-item">
          <a class="nav-link" href="./index.php?content=uitloggen">uitloggen</a>
        </li>';
        }else{
          echo '<li class="nav-item '; echo '">
          <a class="nav-link" href="./index.php?content=inloggen">Login</a>
        </li>';
        }
      ?>
    </div>
      </ul>
      <div class="col-1">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php?content=cart"><img src="./img/wagen.PNG" height="50px" alt=""> <span class="sr-only">(current)</span></a>
          </li>
      </ul>
    </div>
    
  </div>
</nav>