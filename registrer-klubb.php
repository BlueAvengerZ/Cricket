<?php
// inkluderer koblingsfilen min i denne filen:
include("kobling.php");
 ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="utf-8">


 <!-- linker til css filen -->

    <link rel="stylesheet" href="registrer-klubbere.css">



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
        <a href="klubber.php">Clubs</a>
        <a href="registrer_spiller.php">Register player</a>
        <a href="registrer-klubb.php" class="active">Register club</a>

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

 
<h1>Add a club:</h1>


<div class="bks">


<?php


  if(isset($_POST["club"])) {
    $clubname = $_POST["clubname"];
    $username = $_POST["username"];
    $description = $_POST["description"];


// Deretter hvis det er en eller flere felt som er tomt, gi denne beksjeden til brukeren:

  if(empty($clubname) || empty($username) || empty($description)) {
    echo "All fields are required";
  }
  
  else {
    $sql = "INSERT INTO club (clubname, username, description) VALUES ('$clubname', '$username', '$description')";
      if($kobling->query($sql)) {} 
      
   else {
          echo "Noe gikk galt med spørringen $sql ($kobling->error).";
      }
  }

  }

  ?>


    <form method="post">

      <input type="text" name="clubname" placeholder="clubname" id="txt">
      <input type="text" name="username" placeholder="username" id="txt">
      <textarea name="description" rows="8" cols="80" placeholder="Write something you think" id="bkve"></textarea>
      <button type="submit" name="club" class="button">Add club</button>

    </form>


   </div>
  </div>

  <audio src="/Sounds/Upbeat-Background-Music.mp3" autoplay loop>

</section>


    <!-- linker til javascript -->

    <script src="scripts.js"></script>
    
  </body>
</html>
