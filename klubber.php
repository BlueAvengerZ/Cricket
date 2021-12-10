<?php
// inkluderer koblingsfilen min i denne filen:
include("kobling.php");
 ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="utf-8">

   <!-- linker til css filen -->

    <link rel="stylesheet" href="klubberen.css">

  <!-- gir tittel for nettsiden min -->

<title>Welcome to Cricket</title>

<!-- Legger til script kode for menu-bar og skrivene tekst.  -->
   
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>

</head>


  <body>

    <nav class="menu-bar">
  
      <div class="max-width">   
      <div class="nickname"> <a href="index.php">Cricket<span>.CKT</span></a></div>

   <div class="menu">

      <a href="index.php">Home</a>
      <a href="spillere.php">Playeres</a>
      <a href="klubber.php" class="active">Clubs</a>
      <a href="registrer_spiller.php">Register player</a>
      <a href="registrer-klubb.php">Register club</a>

    </div>
   </div>

 </nav>


 <section class="homepage">

  <div class="max-width">

    <div class="text-1"></div>
    <div class="text-2">Names of webdesigner:</div>
    <div class="text-3"><span class="typing"></span></div>
  </div>
  <img src="/bilder/cricket-club.jpeg" alt="club bilde" class="cricket-club">
  <audio src="/Sounds/Cool-Background-Music.mp3" autoplay loop>

</section>



<section class="Clubs">
  
<div id="box">
    
  <h3 id="ovk">Overview of Clubs:</h3>

  <?php

    // Med linjeskift for 1 tabell, her bruker jeg order by klubbnavn, sånn at det sorteres i alfabetisk rekkefølge.
    $sql = "SELECT * FROM club ORDER BY clubname"; //Skriv din sql kode her
    $resultat = $kobling->query($sql);

    while($rad = $resultat->fetch_assoc()) {
        $clubname = $rad["clubname"]; //Skriv ditt kolonnenavn her
        $username = $rad["username"];
        $description = $rad["description"];
  ?>


    <div class="kbn-bkve">
     <h2 class="kbn"><?php echo $clubname;?> (<?php echo $username;?>):</h2>
     <p class="bkve"><?php echo $description;?>:</p>
    </div>

    
  <?php
  }
  ?>

  </div>

</section>


 <!-- linker til javascript -->

 <script src="scripts.js"></script>

  </body>
</html>
