<?php
// inkluderer koblingsfilen min i denne filen:
include("kobling.php");
 ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="utf-8">

   <!-- linker til css filen -->

    <link rel="stylesheet" href="registrer_spillerene-21.css">

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
      <a href="klubber.php">Clubs</a>
      <a href="registrer_spiller.php" class="active">Register player</a>
      <a href="registrer-klubb.php">Register club</a>
      
    </div>
    </div>

</nav>


<section class="homepage">

  <div class="max-width">

  <div class="text-1"></div>
  <div class="text-2">Names of webdesigner:</div>
  <div class="text-3"><span class="typing"></span></div>



<div id="box">

<h1>Add a player:</h1>

<form method="post">

  <input type="text" name="firstname" value="" placeholder="First Name:" id="txt">
  <input type="text" name="surname" value="" placeholder="Last Name:" id="txt">
  <input type="number" name="number_of_runs" value="" placeholder="Made runs:" id="txt">

  <br><br>

  

<!-- Lager nedtrekkliste -->

<select name="club_club_id" id="vgl">

  <?php

  // Med linjeskift for 1 tabell, Legger til en nedtrekksliste.
    $sql = "SELECT * FROM club ORDER BY clubname"; //Skriv din sql kode her
    $resultat = $kobling->query($sql);

    while($rad = $resultat->fetch_assoc()) {
        $clubname = $rad["clubname"]; //Skriv ditt kolonnenavn her
        $club_id = $rad["club_id"];

  ?>

    <option value="<?php echo $club_id;?>"><?php echo $clubname?></option>

   
  <?php 
  }
  ?>

  </select>

  <br><br>

  <button type="submit" name="player" class="button">Add player</button>

</form>



<div class="bks">

<?php

  if(isset($_POST["player"])) {
    $firstname= $_POST["firstname"];
    $surname  = $_POST["surname"];
    $number_of_runs = $_POST["number_of_runs"];
    $club_club_id = $_POST["club_club_id"];



  // Deretter hvis det er en eller flere felt som er tomt, gi denne beksjeden til brukeren:

  if(empty($firstname) || empty($surname) || empty($number_of_runs) || empty($club_club_id)) {
    echo "<div class='bks-2'> All fields are required</div>";
  }

  else{
    $sql = "INSERT INTO player (firstname, surname,number_of_runs, club_club_id)
    VALUES ('$firstname', '$surname', '$number_of_runs', '$club_club_id')";
      if($kobling->query($sql)) {
      echo "<div class='bks-2'> The player is added</div>";
    } 

    else {
          echo "Noe gikk galt med spørringen $sql ($kobling->error).";
      }
  }

  }

  ?>

  </div>
  </div>
  </div>

  <audio src="/Sounds/Upbeat-Background-Music.mp3" autoplay loop>

</section>



<!-- linker til javascript -->

<script src="scripts.js"></script>


 </body>
</html>
