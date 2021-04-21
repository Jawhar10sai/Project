<base href="/Projects/lavoieexpress.com/">
<?php
include_once('headers.php');
 include_once('navbar.php');
 include_once('connection/connectlve.php');
 ?>
 <div class="container-fluid contenu">
   <div class="row">
     <div class="col-md-3 col-xs-12 sidecontainer">
       <!--#############################################################-->
       <h4 class="sidebar-titles">À propos de nous</h4>
       <ul class="sidebar">
         <li class="sidebar-item">
           <a href="Wiki-LVE/Historique" v-bind:style="histactive" >Historique</a>
         </li>
         <li class="sidebar-item">
           <a href="Wiki-LVE/Ressources" v-bind:style="resactive" >Nos ressources</a>
         </li>
         <li class="sidebar-item">
           <a href="Wiki-LVE/Qualite" v-bind:style="qualactive" >Qualité</a>
         </li>
         <li class="sidebar-item">
           <a href="Wiki-LVE/Engagement" v-bind:style="engactive">Notre engagement</a>
         </li>
         <li class="sidebar-item">
           <a href="Wiki-LVE/Reseau" v-bind:style="reseactive" >Notre réseau</a>
         </li>
         <li class="sidebar-item">
           <a href="Wiki-LVE/EntrepriseC" v-bind:style="entreactive">Entreprise citoyenne</a>
         </li>
         <li class="sidebar-item">
           <a href="Wiki-LVE/PolitiqueRH" v-bind:style="polactive">Notre politique RH</a>
         </li>
       </ul>
         <!--#############################################################-->
         <h4 class="sidebar-titles">Nos metiers</h4>
         <ul class="sidebar" id="metside">
           <li class="sidebar-item">
             <a href="Wiki-LVE/Affretement" v-bind:style="affactive">Affrètement</a>
           </li>
           <li class="sidebar-item">
             <a href="Wiki-LVE/Messagerie" v-bind:style="messactive">Messagerie</a>
           </li>
           <li class="sidebar-item">
             <a href="Wiki-LVE/Logistique" v-bind:style="logactive">Logistique</a>
           </li>
         </ul>
           <!--#############################################################-->
           <h4 class="sidebar-titles">Nos entreprises</h4>
           <ul class="sidebar" id="groupside">
             <li class="sidebar-item">
               <a href="Wiki-LVE/IdLogistics" v-bind:style="idactive">ID logistics</a>
             </li>
             <li class="sidebar-item">
               <a href="Wiki-LVE/TEX" v-bind:style="texactive">TEX</a>
             </li>
             <li class="sidebar-item">
               <a href="Wiki-LVE/ESPACIM" v-bind:style="espactive">ESPACIM</a>
             </li>
       </ul>
     </div>
     <div class="col-md-9 col-xs-12 contenu-wiki">
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
