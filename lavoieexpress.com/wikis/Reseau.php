<?php include_once('connection/connectlve.php');
$agences = $connection->query("SELECT * FROM `agence`");
 ?>
<h6 style="margin-bottom:50px;">La voie EXPRESS > Wiki-LVE > Notre réseau</h6>
      <div class="col-12">
        <p class="description">
          La Voie EXPRESS offre un  réseau très développé avec des Agences de distribution en propre, et ce, sur les principales villes du Maroc. Ce réseau d'agences comprend des HUBS nous permettant de livrer quotidiennement sur plus de 129 destinations au MAROC, soit plus de 6 400 destinataires par jour (entreprises, particulier, grande et moyenne surface, etc...).
        </p>
        <table class="table table-striped col-8">
          <tbody>
            <tr class="sub-titlessection">
              <td><strong>Agence</strong></td>
              <td><strong>Adresse</strong></td>
              <td><strong>Tél</strong></td>
            </tr>
            <?php foreach ($agences as $agence): ?>
              <tr class="description">
                <td ><?=$agence['AGENCE_LIB']; ?></td>
                <td ><?=$agence['AGENCE_ADRESSE']; ?></td>
                <td ><?=$agence['AGENCE_TEL']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
<script type="text/javascript">
  var vm = new Vue({
    el:".sidebar",
    data: {
      reseactive:'color:#dc1e2d;'
    }
  });
</script>
