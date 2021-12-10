<?php
// inkluderer koblingsfilen min i denne filen:
include("kobling.php");
 ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="utf-8">

<!-- linker til css filen -->

    <link rel="stylesheet" href="spillerer-1.css">

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
    <a href="spillere.php" class="active">Playeres</a>
    <a href="klubber.php">Clubs</a>
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


  <div id="box">

  <h1>Various information</h1>

  <form method="POST">
    <button type="submit" name="players_with_100_199"class="button">Players with 100-200 runs</button>
    <button type="submit" name="show_all"class="button">Show all</button>
    <button type="submit" name="more_then_200_runs" class="button">Players with over 200 runs</button>

</div>

  <audio src="/Sounds/Cool-Background-Music.mp3" autoplay loop>

</section>







<section class="fle">

    <div class="max-width">

      <h3 class="title">Player and club:</h3>

      <?php

      // henter ut dataen fra databasen, hvor spillere har mer enn 200 runs.
      if(isset($_POST["more_then_200_runs"])) {
        $questioning_1 = "WHERE number_of_runs > 200";
      }

      //henter ut dataen fra databasen, som viser spillere med runs.
      if(isset($_POST["show_all"])) {
        $questioning_2 = "";
      }
      // henter ut dataen fra databasen, hvor spillere har 100 og til å med 200 runs.
      if(isset($_POST["players_with_100_199"])) {
        $questioning_3 = "WHERE number_of_runs BETWEEN 100 AND 199";
      }

      ?>

 


    <p class="flm">

        <?php

          // Med linjeskift for 1 tabell, her bruker jeg INNER JOIN, for å hente ut data fra en annet tabell.
          $sql = "SELECT * FROM player INNER JOIN club ON player.club_club_id = club.club_id  $questioning_1 $questioning_2 $questioning_3 ORDER BY number_of_runs DESC"; //Skriv din sql kode her
          $resultat = $kobling->query($sql);

          while($rad = $resultat->fetch_assoc()) {
              $firstname = $rad["firstname"]; //Skriv ditt kolonnenavn her
              $surname = $rad["surname"];
              $number_of_runs = $rad["number_of_runs"];
              $clubname= $rad["clubname"]
        ?>

      </p>  


      <div class="bgd">
          <h2><?php echo $firstname;?> <?php echo $surname;?></h2>
      </div>
        
      <br><br>

        <center>
          <p id="txt"> Number of runs: <?php echo $number_of_runs;?> Made runs</p>
          <p id="txt"> The team he plays for: <?php echo $clubname?></p>
        </center>

        <?php
        }
        ?>
    </div>

</section>




    <!-- linker til javascript -->

    <script src="scripts.js"></script>


  </body>
</html>
