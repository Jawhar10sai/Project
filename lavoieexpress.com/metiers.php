<base href="/TPS/lavoieexpress.com/">
<?php
  include_once('headers.php');
  include_once('navbar.php');
  include_once('connection/connectlve.php');
 ?>
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12 col-xs-12 contenu-wiki">
       <?php
       if (isset($_GET['p'])) {
         if ($_GET['p']==="")
              $page = 'Historique';
         else
              $page = $_GET['p'];
       }else {
         $page = 'Historique';
          #include('wikis/Description.php');
       }
       include('wikis/'.$page.'.php');
        ?>
     </div>
   </div>
 </div>
 <footer id="lve_footer">
   <?php include_once("lve_mainsections/lve_footer.php"); ?>
 </footer>
