<?php
  if(!isset( $_POST['album']))
    header('index.php');
  $dir = array_diff(scandir(__DIR__."/albumy/".$_POST['album']), array('..', '.'));
  $col = array(array(),array(),array(),array());
  
  $h = array(0,0,0,0);

  foreach ($dir as $folder)
    {
      $height = getimagesize(__DIR__."\\albumy\\".$_POST['album']."\\".$folder)[1];
      $minIndex = 0;
      if($h[1]<$h[$minIndex])
        $minIndex = 1;
      if($h[2]<$h[$minIndex])
        $minIndex = 2;
      if($h[3]<$h[$minIndex])
        $minIndex = 3;
      $h[$minIndex] += $height;
      array_push($col[$minIndex],$folder);
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
  <link rel="stylesheet" href="css/lightbox.css">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
</head>
<body>
 
  <!-- HEADER -->
  <header class="header">
    <nav class="navbar">
      <div class="navbar-wrapper">
      <a class="logo" href="index.php">ANTONINA SZYMCZAK
        <!-- <img src="#" alt=""> -->
      </a>

      <ul class="menu jsMenu">
        <li class="menu-item">
          <a class="menu-link" href="index.php">Works</a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="#">About Me</a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="#"></a>
        </li>
      </ul>
      </div>
    </nav>
    <!-- /HEADER -->

  <!-- ARTICLES -->
  <main>
    <p class="folder-header"><?php echo $_POST['album'] ?></p>
    <section class="row">
      <?php 
        for($index =0;$index<4;$index++){
          $co = $col[$index];
          echo "<article class='column'>";
          $size = sizeof($co);
          for($i =0;$i<$size;$i++){
            $img = $co[$i];
            echo"<img src='albumy\\".$_POST['album']."\\".$img."' onclick='openLightbox();setSlide(".($index+$i*4).")' class='image' alt='".$img."'>";}
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
  
<div id="lightbox" class="lightbox">
  <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
  <a class="lightbox-previousSlide" onclick="changeSlide(-1)">&#10094;</a>
  <a class="lightbox-nextSlide" onclick="changeSlide(1)">&#10095;</a>
  <div id="lightbox-content" class= "lightbox-content">
    <?php 
      $size = sizeof($dir);
      for($i = 0; $i < $size;$i++)
      {
        echo "<img src ='albumy\\".$_POST['album']."\\".$col[$i%4][$i/4]."' class='lightbox-image' id='image".$i."'>";
      }
    ?>
  </div>
</div>
<script src="js/main.js"></script>
<script src="js/lightbox.js"></script>
  </body>
  </html>
