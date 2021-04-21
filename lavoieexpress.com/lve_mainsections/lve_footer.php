<?php
$references = $connection->query("SELECT * FROM `img_ref`");
 ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="text-center">
        <h2 class="text-center titlessection">Références</h2>
       <div class="container" style="margin-bottom:60px;">
       <div class="row">
         <div class="col-12 text-center" style="margin-top:20px;">
           <?php foreach ($references as $value): ?>
               <img class="img rounded" src="assets/<?=$value['emplacement'];?>" title="<?=$value['soc_lib'];?>">
           <?php endforeach; ?>
         </div>
       </div>
       </div>
      </div>
    </div>
  </div>

</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-xs-12">
      <h4>En quelque Mots</h4>
      <h6> <a href="#">Historique</a> </h6>
      <h6> <a href="#">Nos ressources</a> </h6>
      <h6> <a href="#">Qualité</a> </h6>
      <h6> <a href="#">Notre engagement</a> </h6>
      <h6> <a href="#">Notre réseau</a> </h6>
      <h6> <a href="#">Entreprise citoyenne</a> </h6>
      <h6> <a href="#">Notre politique RH</a> </h6>
      <h4>Nos entreprises</h4>
      <h6> <a href="#">ID logistics</a> </h6>
      <h6> <a href="#">Nos ressources</a> </h6>
      <h6> <a href="#">Qualité</a> </h6>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
      <h4>Produits</h4>
      <h6> <a href="#">Affrètement</a> </h6>
      <h6> <a href="#">Logistique</a> </h6>
      <h6> <a href="#">Messagerie</a> </h6>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
      <h4>Conseils pratiques</h4>
      <h6> <a href="#">Astuces</a> </h6>
      <h6> <a href="#">Documents</a> </h6>
      <h4>Carrieres</h4>
      <h6> <a href="#">Rejoignez-nous</a> </h6>
      <h6> <a href="#">Nos offres d'emploi</a> </h6>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
      <h4>Réclamation</h4>
      <h6> <a href="#">Réclamation messagerie</a> </h6>
      <h6> <a href="#">Réclamation affrètement</a> </h6>
      <h4>Contactez nous</h4>
      <h6> <a href="#">Contact</a> </h6>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="text-center">
        <h3 class="sub-titlessection">Trouvez nous sur:</h3>
        <h4>
            <a target="_blank" style="color:#dc1e2d;" href="https://www.facebook.com/lavoieexpress"><i class="fab fa-facebook fa-2x"></i></a>
            <a target="_blank" style="color:#dc1e2d;" href="https://twitter.com/lavoieexpress"> <i class="fab fa-twitter-square fa-2x"></i></a>
            <a target="_blank" style="color:#dc1e2d;" href="https://www.linkedin.com/profile/view?id=171560018&trk=spm_pic"><i class="fab fa-linkedin fa-2x"></i></a>
            <a target="_blank" style="color:#dc1e2d;" href="https://www.youtube.com/channel/UCrTCXaUOu4puNT42dWxMGiQ"><i class="fab fa-youtube fa-2x"></i></a>
        </h4>
            <h5 class="text-center">&copy; <?=date('Y');?> La voie Express</h5>
      </div>
    </div>
  </div>
</div>
<style media="screen">
  h6 a{
    padding-left: 10px;
    text-decoration: none;
    color: #fff;
  }
  h6 a:hover{
    text-decoration:underline;
    color: #fff;
  }
  h4{
    color:#dc1e2d;
  }
</style>
