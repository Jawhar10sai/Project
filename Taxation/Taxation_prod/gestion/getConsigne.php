<?php
require_once "classes/fetchclas.php";
if (isset($_POST['code_vil'])) :
    $ville = Villes::TrouverVille($_POST['code_vil'])
?>
    <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
        <h5><b class="col-11">4) Consignes disponibles sur <?= $ville->VILLE_LIB ?> </b> <i style="margin-left: 565px;" class="fas fa-map-marker-alt" OnClick="consigneVilleMap()"></i> </h5>
    </div>
    <div class="card-body" style="max-height:325px;overflow:auto;">
        <?php
        foreach ($ville->ConsignesVille() as $consigne) {
            if ($consigne->etat == 'En Service') {
                $statut = "service";
                $disabled = "";
            } else {
                $disabled = "disabled";
                $statut = "horsservice";
            }
        ?>
            <style>
                .service {
                    background-color: rgb(118, 204, 118);
                }

                .service:hover {
                    background-color: rgb(50 206 50);
                }

                .horsservice {
                    background-color: #953F3F;
                }

                .consigne {
                    cursor: hand;
                    border-radius: 0.5rem;
                }
            </style>
            <div class="consigne <?= $statut; ?>">
                <div class="form-group form-row">
                    <div class="col-2 mt-4 text-center">
                        <input <?= $disabled; ?> type="radio" name="consigne" id="cons-<?= $consigne->num_serie_consigne; ?>" value="<?= $consigne->num_serie_consigne; ?>" style="height:40px;width:50px;">
                    </div>
                    <div class="col-8">
                        <h3>Numero de consigne : <?= $consigne->num_serie_consigne; ?></h3>
                        <h6><?= $consigne->ville_affectation; ?></h6>
                        <h6><?= $consigne->adresse; ?></h6>
                    </div>
                    <div class="col-2 mt-3">
                        <i class="fas fa-map-marker-alt fa-3x map-" style="color: #fff;" OnClick="consigneMap(<?= $consigne->num_serie_consigne; ?>)"></i>
                    </div>
                    <div class="modal" tabindex="-1" role="dialog" id="map-modal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Consigne: <span id="vilecons"></span></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="map">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
    <!--
    <div id="map-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div id="modal-map-container" class="modal-content" data-toggle="tooltip" title="clicker sur une Marker">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="map"></div>
            </div>
        </div>
    </div>
    -->
<?php endif;
if ($_POST['id_cons']) {
    $id = $_POST['id_cons'];
    $result = Connection::getConsigneConnexion()->prepare("SELECT * FROM consigne where `num_serie_consigne` = ?");
    if ($result->execute([$id]))
        echo json_encode($result->fetch());
}
if ($_POST['consigne_ville']) {
    echo json_encode(Villes::TrouverVille($_POST['consigne_ville'])->ConsignesVille());
}

?>