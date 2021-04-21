<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once "txheads.php";
require_once "gestion/control_utilisateur.php";
$suivisenvois ='active';
 ?>
     <title>LVE - Suivis des envois</title>
     <!--###################################################################################-->
			<?php include_once "includes/lve_navbar.php"; ?>
	 <!--###################################################################################-->
  <div class="container-fluid" style="margin-top:80px;">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h4><b>Suivis des envois</b></h4>
          </div>
          <div class="card-body">
            <h5>Compte Client: <?=  $nom_d_utilisateur;?></h5>
    				<div class="container">
    				  <div class="row">
    				  <div class="col-12">
    						<form id="form-tracking" action="" method="post">
    						<input type="hidden" class="form-control" name="filtrer" value="<?=$client_lve->CLIENT_COD;?>">
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
                    <select  name="type_courrier" class="form-control">
                      <option value="">
                      <option value="Livrée">Livrée
                        <option value="En cours">En cours
                      <option value="Retournée">Retournée
                    </select>
                  </div>
    							<div class="form-group col-md-3 col-xs-12">
    								<button type="submit" class="btn btn-success btn-lg col-md-12 col-xs-12 btn-lve" id="btn-filter" style="margin-top:25px;"> <span class="fa fa-filter"></span> Filtrer</button>
    							</div>
    						  </div>
    						</form>
    						<form method="post" action="Exportation_Excel">
    							<div>
    								<a href="ImprimerTracking" target="_blank" class="btn btn-danger col-md-6 col-xs-12 btn-lve" style="margin-top:10px;"><i class="fas fa-file-pdf"></i> Expoerter vers PDF</a>
    								<button type="submit" class="btn btn-info col-md-6 col-xs-12 btn-lve" style="margin-top:10px;" name="export_tracking"> <i class="fas fa-file-excel"></i> Exporter vers Excel</button>
    							</div>
    						</form>

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
