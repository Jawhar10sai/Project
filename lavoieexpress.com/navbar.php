<nav class="navbar navbar-expand-lg fixed-top">
  <a class="navbar-brand" href="#"><img src="assets/images/voielvej.png" width="250"alt=""> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown" id="dropdownQSN">
        <a class="nav-link dropdown-toggle" href="#qui_lve_qui_somme_nous" id="navbarQSN" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Qui somme nous
        </a>
        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarQSN" id="dropQSN">
          <a class="dropdown-item" href="Wiki-LVE/Historique">Historique</a>
          <a class="dropdown-item" href="Wiki-LVE/Engagement">Nos engagements</a>
          <a class="dropdown-item" href="Wiki-LVE/Reseau">Notre réseau</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#lve_conseils">Conseils pratiques</a>
      </li>
      <li class="nav-item dropdown" id="dropdownCarriere">
        <a class="nav-link dropdown-toggle" href="#lve_carriere" id="navbarCarriere" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Carrieres
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarCarriere" id="dropCarriere">
          <a class="dropdown-item" href="Wiki-LVE/PolitiqueRH">Notre politique RH</a>
          <a class="dropdown-item" href="#rejoignez_nous">Rejoignez nous</a>
          <a class="dropdown-item" href="#offres_emploi">Offres d'emploi</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#lve_contact">Contact</a>
      </li>
    </ul>
  </div>
</nav>
<script type="text/javascript">
$(document).ready(function(){

  $('#dropdownCarriere').mouseover(function(){
    $('#dropCarriere').show();
    $('#dropQSN').hide();
  });
  $('#dropCarriere').mouseleave(function(){
    $(this).hide();
  });

  $('#dropdownQSN').mouseover(function(){
    $('#dropQSN').show();
    $('#dropCarriere').hide();
  });
  $('#dropQSN').mouseleave(function(){
    $(this).hide();
  });
});

</script>
