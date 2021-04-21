<div class="container-fluid" style="margin-top:60px;" >
  <div class="row" data-aos="fade-up" data-aos-duration="2500">
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="card descript_cards">
        <iframe  class="card-img-top" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.0086725304263!2d-7.561811684487968!3d33.60507944860849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7ccf9838f72cf%3A0x48bab15bec7b9082!2sLA%20VOIE%20EXPRESS!5e0!3m2!1sfr!2sma!4v1582564396079!5m2!1sfr!2sma" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        <div class="card-body">
          <h5 class="card-title">Nos agences</h5>
          <p class="card-text description">La Voie EXPRESS offre un  réseau très développé avec des Agences de distribution en propre, et ce, sur les principales villes du Maroc. </p>
          <a href="#" class="btn btn-lve btn-block btn-lg">Les agences plus proches</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="card descript_cards">
        <div class="card-body">
          <h5 class="card-title">Estimation des Tarifs</h5>
          <div class="row">
              <div class="form-group col-md-6 col-xs-12">
                <label for="">Ville destination :</label>
                <input type="text" onkeypress="return lettersOnly()" class="form-control form-control-sm" id="idvildest" name="" value="">
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <label for="">Ville d'arrivée :</label>
                <input type="text" onkeypress="return lettersOnly()" class="form-control form-control-sm" id="idarriv" name="" value="">
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-xs-12">
              <label for="">poids :</label>
              <input type="text" class="form-control form-control-sm" id="poids" name="" value="">
            </div>
            <div class="form-group col-md-6 col-xs-12">
              <label for="">Hauteur :</label>
              <input type="text" class="form-control form-control-sm" id="idhaut" name="" value="">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-xs-12">
              <label for="">Largeur :</label>
              <input type="text" class="form-control form-control-sm" id="idlarg" name="" value="">
            </div>
            <div class="form-group col-md-6 col-xs-12">
              <label for="">Longueur :</label>
              <input type="text" class="form-control form-control-sm" id="idlong" name="" value="">
            </div>
          </div>
          <button type="button" class="btn btn-lg btn-block btn-lve" name="button" id="calcultarif">Calculer le tarif</button>
          <p class="description">Le tarif estimé: <span id="idtarif"></span> </p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="card descript_cards">
        <div class="card-body descript_cards_body" >
          <h5 class="card-title">Suivis vos envois</h5>
          <div class="form-group">
            <label for="">Saisissez l'intégralité de votre envoi.
              Le numéro d'envoi est inscrit sur la lettre de transport.</label>
            <input type="text" class="form-control" name="" value="" style="margin-bottom:20px;">
            <button type="button" class="btn btn-lg btn-block btn-lve" name="button">Suivis</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
