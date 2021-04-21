<?php
include_once("headers.php");
include_once('connection/connectlve.php');
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">

     <title>La voie EXPRESS</title>
   </head>
   <body>
            <?php include("navbar.php"); ?>
     <!--********************** HEADER **************************-->
     <section id="lve_produits">
       <?php include("lve_mainsections/lve_produits.php"); ?>
     </section>
     <section id="lve_descriptt">
       <?php include("lve_mainsections/lve_descript.php"); ?>
     </section>
     <!--********************** main **************************-->
     <main>
      <!-- <section id="lve_descript">
       </section>-->
       <section id="qui_lve_qui_somme_nous" >
         <?php include("lve_mainsections/lve_qui_somme_nous.php"); ?>
       </section>

       <section id="lve_conseils">
         <?php include("lve_mainsections/lve_conseils.php"); ?>
       </section>
       <!--<section id="lve_reclamation">
         <?php #include("lve_mainsections/lve_reclamation.php"); ?>
       </section>-->
       <section id="lve_carriere" >
         <?php include("lve_mainsections/lve_carriere.php"); ?>
       </section>
       <section id="lve_contact">
         <?php include("lve_mainsections/lve_contact.php"); ?>
       </section>
     </main>
     <!--********************** FOOTER **************************-->
     <footer id="lve_footer">
       <?php include_once("lve_mainsections/lve_footer.php"); ?>
     </footer>
     <script>
    AOS.init();
    $(document).ready(function(){
      specifier();
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function () {

      $('a[href^="#lve_descriptt"]').addClass('active');

    //smoothscroll
      $('.nav-link').on('click', function (e) {
          e.preventDefault();
          //  $(document).off("scroll");
          var athis = this;
          var target = this.hash,
                  menu = target;
          $target = $(target);
          $('html, body').stop().animate({
              'scrollTop': $target.offset().top + 2
          }, 800, 'swing', function () {
              window.location.hash = target;
              $('.nav-link').removeClass('active');
              $(athis).addClass('active');

          });
      });

      $(window).scroll(function (event) {
          var scrollPos = $(document).scrollTop();
          if (scrollPos === 0)
          {
              $('a[href^="#lve_descriptt"]').addClass('active');
              return;
          }
          $('.nav-link').each(function () {
              var currLink = $(this);
              var refElement = $(currLink.attr("href"));
              if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                  $('.nav-link').removeClass("active");
                  currLink.addClass("active");
              } else {
                  currLink.removeClass("active");
              }
          });
      })
    });
    </script>
   </body>
 </html>
