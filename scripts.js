$(document).ready(function(){

    // lager funksjon som gjør at, når blar ned så kommer det blå bakgrunn på menu bar.
  
      $(window).scroll(function(){
  
       // sticky menu-bar on scroll script Start
  
  
      // hvis scrollY er større enn 20, så skal menu bar få blå bakgrunn.
  
          if (this.scrollY > 20) {
              $('.menu-bar').addClass("sticky");
          }
  
     // hvis ikke scrollY er større enn 20, så skal bakgrunne til menu bar fjernes.
  
          else {
                $('.menu-bar').removeClass("sticky");
              }
        });
  
       // sticky menu-bar on scroll script End
  
  
  
      // typing text animation script Start
  
  
      // lager variabel for animation til tekst nummer 1.
      // Etter det legger jeg til teksten som skal bli skrevet.
      // Også bestemmer jeg hastiget til teksten, som blir skrevet og blir slettet.
      // Hvis det er sant, så skal det gjenta igjen og igjen
  
      var typed = new Typed(".typing", {
          strings: ["Bilal Hussain", "Web Designer"],
          typeSpeed: 100,
          backSpeed: 60,
          loop: true
      });
  
      // lager variabel for animation til tekst nummer 2.
      // Etter det legger jeg til teksten som skal bli skrevet.
      // Også bestemmer jeg hastiget til teksten, som blir skrevet og blir slettet.
      // Hvis det er sant, så skal det gjenta igjen og igjen
  
      var typed = new Typed(".typing-2", {
          strings: ["Bilal Hussain", "Web Designer"],
          typeSpeed: 100,
          backSpeed: 60,
          loop: true
      });
  
    // typing text animation script End
  
    
  });
  
  
  
  
  