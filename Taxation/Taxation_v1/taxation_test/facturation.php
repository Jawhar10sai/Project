<?php

require_once "classes/fetchclas.php";
if (isset($_GET['id_fact'])) {
  $declarations->Facture($_GET['id_fact']);
  exit;
}
require_once "txheads.php";
require_once "navbar.php";
 ?>
<div class="container-fluid " style="margin-top:80px; " >
  <div class="row">
    <form action="index.html" method="post">
        <div class="col-auto">
          <label class="sr-only" for="inlineFormInputGroup">Username</label>
          <div class="input-group mb-2">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
            <div class="input-group-prepend">
              <div class="input-group-text"> <button style="background:transparent;border:0px;" type="button" name="button"><i class="fas fa-search"></i></button> </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Numéro de facture" name="fact_id" value="">
        </div>
        <input type="text" class="form-control" placeholder="Numéro de facture" name="fact_id" value="">
    </form>
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
          <tr>
            <th>Numéro de déclaration</th>
            <th>Client</th>
            <th>code client</th>
            <th>Numéro de facture</th>
            <th>Numéro de facture</th>
          </tr>
          <tr>
            <td>E3500</td>
            <td>Mon Client</td>
            <td>10</td>
            <td>
              <a type="button" target="_blank" class="btn btn-outline-danger" id="facturer" href="facturation.php?id_fact=E003001"> <i class="fas fa-file-pdf "></i> </a>
               <label class="ml-5">F00523658</label>
               <!--
               <div class="modal mymodal" tabindex="-1" role="dialog" id="factmodal-F00523658">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Facture numéro F00523658 </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container-fluid" id="fact-F00523658-pdf">
                          <div class="row" style="margin-top:0px;">
                            <div class="col-md-11 col-xs-12">
                              <img src="images/voielvej.png" height="50px" alt="">
                              <img src="images/logo_certificat_iso_9001_afnor_nov_2012.png" height="50px" alt="">
                              <img src="images/Afaq_27001_175b.png" height="50px" alt="">
                            </div>
                            <h5 class="text-left">F-25</h5>
                          </div>
                          <div class="row">
                            <div class="col-md-6 offset-md-1">
                              <table class="text-center table">
                                <tr>
                                  <td style="border:1px solid black;">Date de facture</td>
                                  <td style="border:1px solid black;">Numero</td>
                                  <td style="border:1px solid black;">Code Client</td>
                                </tr>
                                <tr>
                                  <td><?#date('d/m/Y');?></td>
                                  <td>F00523658</td>
                                  <td>11129</td>
                                </tr>
                              </table>
                            </div>
                            <div class="col-md-4" style="border: 1px solid black;border-radius: 0.5rem;">
                            <h4>Client</h4>
                              <h5>NOM</h5>
                              <h5>Adresse</h5>
                              <h5>Ville</h5>
                              <h5>ICE</h5>
                            </div>
                          </div>
                          <div class="row">
                            <table class="table text-center">
                              <tr>
                                <td>Numero</td>
                                <td>Date</td>
                                <td>Expediteur</td>
                                <td>Destinataire</td>
                                <td>Ville depart</td>
                                <td>Ville arrivee</td>
                                <td>Colis</td>
                                <td>poids</td>
                                <td>Montant H.T</td>
                              </tr>
                              <tr>
                                <td>11129</td>
                                <td>11129</td>
                                <td>11129</td>
                                <td>11129</td>
                                <td>11129</td>
                                <td>11129</td>
                                <td>11129</td>
                                <td>11129</td>
                                <td>11129</td>
                              </tr>
                            </table>
                          </div>
                        <div class="row col-6 offset-md-5">
                          <table class="table text-center">
                            <tr>
                              <td>Numero</td>
                              <td>Date</td>
                              <td>Expediteur</td>
                            </tr>
                            <tr>
                              <td>11129</td>
                              <td>11129</td>
                              <td>11129</td>
                            </tr>
                            <tr>
                            <td>11129</td>
                            <td>11129</td>
                            <td>11129</td>
                            <td></td>
                            <td>11129</td>
                          </tr>
                          <tr>
                          <td>11129</td>
                          <td>11129</td>
                          <td>11129</td>
                          <td>=</td>
                          <td>11129</td>
                        </tr>
                          </table>
                        </div>
                        <div class="row">
                          <p>Arrêtée la présente facture à la somme de
                                  Soixante DIRHAMS TTC</p>
                        </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="FacturetoPDF('F00523658');">Enregistrer PDF</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
              -->
            </td>
            <td><i class="fas fa-file-pdf"></i> AV00523658</td>
          </tr>
      </table>
    </div>
  </div>
</div>
<style media="screen">
  .mymodal{
    left: -113px;
  }
  .mymodal .modal-content{
    width: 80vw;
    max-height: 90vh;
    overflow: auto;
  }
  .mymodal .modal-content .modal-body{
    overflow: auto;
  }
  .row{
    margin-top: 50px;
  }
</style>
<script src="assets/jspdf.js"></script>
<script src="assets/jquery-2.1.3.js"></script>
<script src="assets/pdfFromHTML.js"></script>
