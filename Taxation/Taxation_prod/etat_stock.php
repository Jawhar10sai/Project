<?php
require_once('txheads.php');
include_once "gestion/control_utilisateur.php";
if ($client_lve->CLIENT_TYP != "TRL")
    echo "<script>history.go(-1);</script>";
$etat_stk = 'active';
?>
<style media="screen">
    /*::cue().btn {
         padding: 8px 4px 8px 1px;
     }
     #btnExport {
         padding: 10px 40px;
         font-size: 0.9em;
     }*/
</style>
<title>LVE - Etat de stock</title>
<?php include_once "includes/lve_navbar.php"; ?>
<div class="container-fluid lve-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
                    <h4><b>Etat de stock du <?= Stock::Date_MAJ(); ?></b></h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <form action="Exportation_Excel" method="post">
                            <button type="submit" name="export_etat_stock" class="btn btn-success btn-lve col-md-3 col-xs-12">
                                <i class="fas fa-file-excel"></i> Exporter vers Excel</button>
                        </form>
                    </div>
                    <table class="table table-bordered" id="table-stock">
                        <thead>
                            <tr>
                                <th class="text-center">Article</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Nombre d'emplacement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($client_lve->Etat_Stock() as $article) : ?>
                                <tr>
                                    <td><?= utf8_encode($article->designation); ?></td>
                                    <td class="text-center"><?= ($article->statut == 'STD') ? "Standard" : (($article->statut == 'BLQ') ? "Bloqué" : "Manque");
                                                            ?></td>
                                    <td class="text-center"><?= $article->quantite; ?></td>
                                    <td class="text-center"><?= $article->nbre_emplacement; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "includes/lve_footer.php"; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table-stock').dataTable({
            "language": {
                "lengthMenu": "Affichage _MENU_ pages",
                "zeroRecords": "Pas d'elements",
                "info": "Affichage de _PAGE_ of _PAGES_",
                "infoEmpty": "Pas d'elements",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Recherche",
                "paginate": {
                    "previous": "Précédent",
                    "next": "Suivant"
                }
            }
        });
    });
</script>