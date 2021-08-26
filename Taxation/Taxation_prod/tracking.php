<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once "txheads.php";
require_once "gestion/control_utilisateur.php";
$suivisenvois = 'active';
?>
<title>LVE - Suivis des envois</title>
<!--###################################################################################-->
<?php include_once "includes/lve_navbar.php"; ?>
<!--###################################################################################-->
<div class="container-fluid lve-content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h4><b>Suivis des envois</b></h4>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <form id="form-tracking" action="" method="post">
                  <div class="form-row">
                    <div class="form-group col-md-3 col-xs-12">
                      <label for="">Du</label>
                      <input type="date" class="form-control" name="date1">
                    </div>
                    <div class="form-group col-md-3 col-xs-12">
                      <label for="">Au</label>
                      <input type="date" class="form-control" name="date2">
                    </div>
                    <div class="form-group col-md-3 col-xs-12">
                      <label for="">Type</label>
                      <select name="type_courrier" class="form-control">
                        <option value="">Toutes
                        <option value="Livrée">Livrées
                        <option value="En cours">En cours
                        <option value="Retournée">Retournées
                      </select>
                    </div>
                    <?php if ($client_lve->CLIENT_TYP == "TRL") : ?>
                      <div class="form-group col-md-3 col-xs-12">
                        <label for="">Type</label>
                        <select name="type_dec" class="form-control">
                          <option value="">Toutes
                          <option value="Commerciales">Commerciales
                          <option value="proactif">Proactif
                        </select>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group col-md-12 col-xs-12">
                    <button type="submit" class="btn btn-success btn-lg col-md-6 col-xs-12 btn-lve" id="btn-filter" style="margin-top:25px;"> <span class="fa fa-filter"></span> Filtrer</button>
                  </div>
                </form>
              </div>
              <div class="row">
                <form method="post" action="Exportation_Excel">
                  <button type="submit" class="btn btn-lg btn-info col-xs-12 btn-lve" style="margin-top:10px;" id="export_tracking" name="export_tracking"> <i class="fas fa-file-excel"></i> Exporter vers Excel</button>
                  <a href="ImprimerTracking" target="_blank" class="btn btn-lg btn-danger col-xs-12 btn-lve" style="margin-top:10px;"><i class="fas fa-file-pdf"></i> Exporter vers PDF</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="dvData">
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<script src="assets/scripts/lve-track.js" charset="utf-8"></script>
<script type="text/javascript" src="assets/scripts/jquery.dataTables.min.js"></script>
<?php include_once "includes/lve_footer.php"; ?>