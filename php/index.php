<?php
session_start();
  $dir = array_diff(scandir(__DIR__."/albumy"), array('..', '.'));
  $col = array(array(),array(),array(),array());
  $c = 0;
  foreach ($dir as $folder)
    {
      array_push($col[$c%4],$folder);
       $c++;
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Antonina Szymczak</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
</head>
<body>


  <!-- HEADER -->
  <header class="header">
  <nav class="navbar">
      <div class="navbar-wrapper">
      <a class="logo" href="#">ANTONINA SZYMCZAK
        <!-- <img src="#" alt=""> -->
      </a>

      <ul class="menu jsMenu">
        <li class="menu-item">
          <a class="menu-link" href="#">Works</a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="about-me.html">About Me</a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="#"></a>
        </li>
      </ul>
      <button type="button" class="menu-button jsMenuButton">
        <span class="menu-button-item"></span>
        <span class="menu-button-item"></span>
      </button>
      </div>
    </nav>
    <!-- /HEADER -->

  <!-- ARTICLES -->
 
  <main>
    <section class="row">
    <?php   
        foreach($col as $co){
          echo "<article class='column'>";
          foreach($co as $p){
            $image = scandir(__DIR__."\\albumy\\".$p);
            echo "<form method='post' action='album.php'>
              <button class='category-button' type='submit' name='album' value='".$p."'>
                <img src='albumy\\".$p."\\".$image[2]."' class='image' alt='".$p."'>
                <p class=\"category-title\">".$p."</p>
              </button>
            </form>";
          }  
          echo "</article>";
        }
      ?>
    </section>

  </main>
<footer class="footer">
  <ul class="footer-menu1">
    <li><a class="footer-link" href="https://github.com/sophiepopow">&#169;Antonina Szymczak Site by .</a>
    <li><a class="footer-link" href="https://github.com/sophiepopow">   Sophie Popow</a>

  </ul>
  <ul class="footer-menu2">
    <li><a class="footer-link" href="#"><img class="footer-icon" src="images/facebook.svg" alt=""></a>
    <li><a class="footer-link" href="#"><img class="footer-icon" src="images/instagram.svg" alt=""></a>

  </ul>
</footer>
  <script src="js/main.js"></script>
  </body>
  </html>
