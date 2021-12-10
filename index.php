<?php
// inkluderer koblingsfilen min i denne filen:
include("kobling.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="icon" type="image/x-icon" href="bilder/cricket-logo.ico">


    <!-- linker til css filen -->

    <link rel="stylesheet" href="styles-15.css">

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

      <a href="index.php" class="active">Home</a>
      <a href="spillere.php">Playeres</a>
      <a href="klubber.php">Clubs</a>
      <a href="registrer_spiller.php">Register player</a>
      <a href="registrer-klubb.php">Register club</a>

   </div>
  </div>

  </nav>


<section class="homepage">

  <div class="max-width">

   <div id="box">

   <h1>Welcome to cricket webside:</h1>

   <div id=txt-box>
   <p id= "txt">
      Cricket is a team sport for two teams, each with eleven players. 
      The sport is of English origin, and is practiced with cricket ball and bat on an elliptical grass court. 
      In the center of the field there is an elongated strip with harder ground, where most of the game takes place. 
      The goal is to score more points than the opponent.
   </p>
  </div>
  </div>

  <video autoplay muted loop id="myVideo">
    <source src="Cricket-video.mp4" type="video/mp4">
  </video>

   <audio src="/Sounds/Cricket-1.mp3" autoplay loop>

  </div>

</section>





<section class="sfb">

<div class="max-width">

  <h1 class="title">Sport Cricket</h1>


  <div class="klb-spl">

    <?php
        // Med linjeskift for 1 tabell, her bruker jeg order by klubbnavn, sånn at det sorteres i alfabetisk rekkefølge.
        $sql = "SELECT * FROM club ORDER BY clubname"; //Skriv din sql kode her
        $resultat = $kobling->query($sql);

        while($rad = $resultat->fetch_assoc()) {
              $clubname = $rad["clubname"]; //Skriv ditt kolonnenavn her
              $username = $rad["username"];
              $description = $rad["description"];
    ?>


       <h2 id="kbn"><?php echo $clubname; ?> (<?php echo $username;?>):</h2>

       <div class="klb-spl-2">
        <p id="bkve"><?php echo $description;?></p>
       </div>

       <h2 id="bkve-2">Description:</h2>
       
    <?php
    }

        // Dersom hvis det ikke blir oppfunnet ingen rad i databasen, vil det komme opp Ingen klubb er registrert.

          if($resultat->num_rows == 0) { ?>
            <p id="no-club">No club registered:</p>
            <a href="registrer-klubb.php"><button class="button">Add a club now</button></a>

        <?php
        }
        ?>
        

      <?php
          
          // Med linjeskift for 1 tabell, her bruker jeg INNER JOIN, for å hente ut data fra en annet tabell.
          $sql = "SELECT * FROM player INNER JOIN club ON player.club_club_id = club.club_id ORDER BY number_of_runs DESC"; //Skriv din sql kode her
          $resultat = $kobling->query($sql);

          while($rad = $resultat->fetch_assoc()) {
                $firstname = $rad["firstname"]; //Skriv ditt kolonnenavn her
                $surname = $rad["surname"];
                $number_of_runs = $rad["number_of_runs"];
                $clubname = $rad["clubname"]   
        ?>
  

            <h2 id="fn-en"><?php echo $firstname;?> <?php echo $surname;?>(<?php echo $number_of_runs;?> made runs)</h2> <br>
            <p id="txt-2">The team he plays for: <span id="txt-3"><?php echo $clubname?></span></p>

            <br>

      <?php
      }

        // Dersom det bir ikke oppfunet noen rad i databasen, vil det komme opp Ingen spillere er registret.
        if($resultat->num_rows == 0) { ?>
            <p id="no-players">No players are registered:</p>
            <a href="registrer_spiller.php"><button class="button-2">Add a player now</button></a>

        <?php
       }
        ?>

     </div> 
    </div>

  </section>



    <!-- linker til javascript -->

    <script src="scripts.js"></script>

  </body>
</html>
