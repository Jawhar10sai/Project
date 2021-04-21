<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once('txheads.php');

if (isset($_SESSION['user_id'])) {
  $cllves = $clients->CurrentUser($_SESSION['user_id']);
/*################################# AJOUT #################################################*/
  if (isset($_POST['declarer'])) {
    if (empty($_POST['valeur'])) {
      $_POST['valeur']=100;
    }elseif ($_POST['valeur']<4) {
      $_POST['valeur']=4;
    }
    if (empty($_POST['Espece'])) {
      $_POST['Espece']=0;
    }
    if (empty($_POST['Cheque'])) {
      $_POST['Cheque']=0;
    }
    if (empty($_POST['Traite'])) {
      $_POST['Traite']=0;
    }

    if ($_POST['BLstat']=="Non") {
      $_POST['BL']="";
      $Nbre_BL=0;
    }else {
      $nombres = explode(" | ", $_POST['BL']);
      $Nbre_BL=-1;
      foreach ($nombres as $nombre) {
        $Nbre_BL+=1;
      }
    }
    if (empty($_POST['prenom'])) {
      $_POST['prenom'] = "";
    }
    if ($_POST['courrier_typ']=='M') {
      $courrier_typ = 'M';
      $typliv = $_POST['typliv'];
    }else{
      $courrier_typ = $_POST['affrettyp'];
      $typliv = "";
    }
	if($_POST['palstat']=="Non"){
	 $paletteA=0;
	  $paletteB=0;
	  $paletteC=0;
	}else{
    if (empty($_POST['paletteA'])) {
      $paletteA=0;
    }else {
        $paletteA = $_POST['paletteA'];
    }
    if (empty($_POST['paletteB'])) {
      $paletteB=0;
    }else {
      $paletteB = $_POST['paletteB'];
    }
    if (empty($_POST['paletteC'])) {
      $paletteC=0;
    }else {
      $paletteC = $_POST['paletteC'];
    }
	}
    if (empty($_POST['long'])) {
      $long = 0;
    }else {
      $long = $_POST['long'];
    }
    if (empty($_POST['larg'])) {
      $larg = 0;
    }else {
      $larg = $_POST['larg'];
    }
    if (empty($_POST['haut'])) {
      $haut = 0;
    }else {
      $haut = $_POST['haut'];
    }
    $cl = $clients->verificationClient($_POST['codecli'],$_POST['nom'],$_POST['prenom'],$_POST['telephone'],$_SESSION['user_id']);
    $adr = $adresses->verifieradresse($cl,$_POST['adresse'],$_SESSION['user_id'],$_POST['ville']);
    $declarations->AjouterDeclar(date('Y-m-d'),$_POST['colis'],$_POST['poids'],$paletteA,$paletteB,$paletteC,$long,$haut,$larg,$_POST['valeur'],$cl,$_POST['livraison'],$typliv,$_POST['port'],$courrier_typ,$_POST['nature'],$_SESSION['user_id'],$_POST['Espece'],$_POST['Cheque'],$_POST['Traite'],$Nbre_BL,$_POST['BL'],$adr);
    if ($_POST['codecli']=='0') {
      $clients->setNull($cl);
    }
    header('location: declaration.php#liste_declarations');
  }
  /*################################# MODIFICATION #################################################*/

  if (isset($_POST['modif'])) {
    if (isset($_POST['mexpress'])) {
      $express = "X";
    }else {
      $express = "S";
    }
    $date = $_POST['mdate'];
    $colis = $_POST['mcolis'];
    $poids = $_POST['mpoids'];
    $valeur = $_POST['mvaleur'];
    $client2_id = $clients->CODID($_POST['mclient']);
    $livraison = $_POST['mlivraison'];
    $port = $_POST['mport'];
    $courrier_typ = $_POST['mcourrier_typ'];
    $nature = $_POST['mnature'];
    $Espece = $_POST['mEspece'];
    $Cheque = $_POST['mCheque'];
    $Traite = $_POST['mTraite'];
    $BL = $_POST['mBL'];
    $numero = $_POST['mnumero'];
    $mlong = $_POST['mlong'];
    $mlarg = $_POST['mlarg'];
    $mhaut = $_POST['mhaut'];
    $mpaletteA = $_POST['mpaletteA'];
    $mpaletteB = $_POST['mpaletteB'];
    $mpaletteC = $_POST['mpaletteC'];
    $cl = $clients->verificationClient($_POST['mclient'],$_POST['mmodnom'],$_POST['mmodprenom'],$villes->VilleID($_POST['mmodville']),$_POST['mmodtelephone'],$_SESSION['user_id']);
    $adr = $adresses->verifieradresse($cl,$_POST['mmodadresse'],$_SESSION['user_id'],$villes->VilleID($_POST['mmodville']));
    $modf = $declarations->ModifierDeclar($numero,$date,$colis,$poids,$mpaletteA,$mpaletteB,$mpaletteC,$mlong,$mlarg,$mhaut,$valeur,$cl,$livraison,$express,$port,$courrier_typ,$nature,$Espece,$Cheque,$Traite,$BL,$adr);
    header('location: declaration.php#liste_declarations');
  }

/*################################# LISTE DES DECLARATION NON RAMASSEES #################################################*/
    $list_dec = $declarations->DeclarNonRamassees($_SESSION['user_id']);
  /*################################# SUPPRESSION #################################################*/
  /*if (isset($_POST['suppp'])) {
    $declarations->ArchevDeclaration($_POST['numdec']);
    $declarations->suuprimerDeclaration($_POST['numdec']);
    header('location: declaration.php');
  }*/
$nosagences = $agences->nosAgences();

}else {
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style media="screen">
    #foot{
      background-color: #ffffff;
      border-radius: 5px;
      border: 1px solid;
    }
    </style>
  </head>
  <body onload="specifier()" style="  background-image: url('images/LOGOSANS150.jpg');
    background-size: 150px 104px;
    background-repeat: repeat;
	/*zoom: 90%;*//*zoom: 90%;*/">
    <!--###################################################################################-->

    <nav class="navbar navbar-expand-lg navbar-inverse fixed-top navbar-dark" style="background-color:#a8a8a8;">
           <a class="navbar-brand" href="consultation.php"> <img src="images/voielvej.png" height="37.453" width="114" alt=""> </a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                   <a class="nav-link" href="consultation.php" style="font-size:18px;">Consultaion</a>
                </li>
                 <li class="nav-item active">
                    <a class="nav-link" href="declaration.php" style="font-size:18px;">Déclaration <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link " href="track.php" style="font-size:18px;">Suivi colis</a>
                 </li>
                 <?php if ($_SESSION['typuser']=="clientlve"): ?>
                   <li class="nav-item">
                      <a class="nav-link " href="agences.php" style="font-size:18px;">Mes sessions</a>
                   </li>
                 <?php endif; ?>
                 <!--<li class="nav-item">
                    <a class="nav-link" href="" style="font-size:18px;">Facturation</a>
                 </li>-->
				 <li class="nav-item">
                    <a class="nav-link " href="tracking.php" style="font-size:18px;">Suivis des envois</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="Reclamation/" style="font-size:18px;">Réclamations</a>
                 </li>
              </ul>
              <ul class="nav navbar-nav navbar-right" style=" padding: 5px;border-radius:15px;background-color: #CCCCCC;">
                <li class="nav-item">
                  <a href="panierramass.php" style="color:red;"><img src="images/cart.png" width="25" height="25" alt=""><span style="padding-left: 15px;color:#545454;font-size:25px;"><?=$_SESSION['countcart'];?></span></a>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right col-1">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$_SESSION['usernom'];?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.php"><span><i class="fas fa-user"></i></span>Profile</a>
                    <a class="dropdown-item" href="deco.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Deconnecter</a>
                  </div>
                </li>
              </ul>
           </div>
        </nav>
    <!--######################################******************* MAIN container ********************#############################################-->
    <div class="container-fluid" style="margin-top:80px;">
      <div class="row">
        <div class="col-10 maindiv">
          <!--##############################################***************FORM******************##################################################################-->
          <form class="" action="<?=$_SERVER['PHP_SELF'];?>" autocomplete="off" method="post">
            <div class="row">

                          <div class="col-md-6">
                            <div class="card">
                              <div class="card-header">
                                 <h4><b> 1) Expéditeur</b></h4>
                              </div>
                              <div class="card-body" style="background-color: gainsboro;border-radius: 0 0 0.65rem 0.65rem; ">
                                <?php foreach ($cllves as $cllve): ?>
                                <div class="form-row">
                                  <div class="form-group col-6">
                                    <label for=""> Code:</label>
                                    <input type="text" class="form-control form-control-sm" value="<?=$cllve['CLIENT_COD'];?>" disabled>
                                  </div>
                                  <div class="form-group col-6">
                                    <label for=""> Nom:</label>
                                    <input type="text" class="form-control form-control-sm" value="<?=$cllve['NOM'];?>" disabled>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-6">
                                    <label for=""> ICE:</label>
                                    <input type="text" class="form-control form-control-sm" value="<?=$cllve['ICE'];?>" disabled>
                                  </div>
                                  <div class="form-group col-6">
                                    <label for=""> Telephone:</label>
                                    <input type="text" class="form-control form-control-sm" value="<?=$cllve['telephone'];?>" disabled>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-7">
                                    <label for=""> Contact:</label>
                                    <input type="text" class="form-control form-control-sm" value="<?=$cllve['mail'];?>" disabled>
                                  </div>
                                  <div class="form-group col-5">
                                    <label for=""> Ville:</label>
                                    <input type="text" class="form-control form-control-sm" value="<?=$cllve['ville'];?>" disabled>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-12">
                                    <label for=""> Adresse:</label>
                                    <input type="text" class="form-control form-control-sm" value="<?=$cllve['adresse'];?>" disabled>
                                  </div>
                                </div>
                                <?php endforeach; ?>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-header">
                                 <h4> <b>2) Destinataire</b> </h4>
                              </div>
                              <div class="card-body">
                                <div class="form-row">
                                  <div class="form-group col-12">
                                    <label for=""> Code:<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="codecli" name="codecli" onkeyup="afficheinfoclient()" required>
                                  </div>
                                  <div class="form-group col-12 alert alert-warning" role='alert' id="mess" style="margin-bottom: 0px;padding: 3;width:100%; display : none;">
                                    <label>Client inexistant, veuillez-vous remplir les autres champs!</label>
                                  </div>
                                </div>
                                <div class="minfoclient">
                                  <div class="form-row">
                                      <div class="form-group col-6">
                                        <label for=""> Nom:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm" id="nom" name="nom" value=""  required>
                                        <div class="segg">

                                        </div>
                                      </div>
                                      <div class="form-group col-6">
                                        <label> Prénom:</label>
                                        <input type="text" class="form-control form-control-sm" id="prenom" name="prenom" value="">
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-12">
                                        <label for=""> Adresse:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm" id="adresse" name="adresse" value="" required>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-6">
                                        <label for=""> Ville:<span style="color:red;">*</span></label>
                                        <select class="form-control form-control-sm" name="ville" id="ville" required>
                                          <option value="" id="firstval"></option>
                                          <?php foreach ($villes->listeVille() as $ville): ?>
                                            <option value="<?=$ville['VILLE_COD'];?>"><?=$ville['VILLE_LIB'];?></option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>
                                      <div class="form-group col-6">
                                        <label for=""> Téléphone:<span style="color:red;">*</span></label>
                                        <input type="tel" maxlength="10" placeholder="05XXXXXXXX" class="form-control form-control-sm" id="telephone" name="telephone" value="" required>
                                      </div>
                                    </div>
                                </div>

                              </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-header">
                                 <h4> <b>3) Livraison</b> </h4>
                              </div>
                              <div class="card-body">
                                <div class="form-row">
                                   <div class="form-group col-md-6">
                                      <label for="colis">Nbre colis:<span style="color:red;">*</span></label>
                                      <input class="form-control form-control-sm" type="number" min="1" step="1" name="colis"  id="colis" required >
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="poids">Poids:(Kg)<span style="color:red;">*</span></label>
                                      <input class="form-control form-control-sm text-right" type="text" min="0"    name="poids"  id="poids" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                   <fieldset class="form-group  col-md-6">
                                     <h5>Livraison :</h5>
                                     <div class="form-check">
                                       <label class="form-check-label">
                                         <input type="radio" class="form-check-input livr" name="livraison" id="D" value="D" checked>
                                         À domicile
                                       </label>
                                     </div>
                                     <div class="form-check" id="Gare">
                                       <label class="form-check-label">
                                        <input type="radio" class="form-check-input livr" name="livraison" id="G" value="G">
                                        En gare
                                       </label>
                                     </div>
                                     <div class="form-check" id="pointR">
                                       <label class="form-check-label">
                                         <input type="radio" class="form-check-input livr" disabled name="livraison" id="Prr" value="p">
                                         Points relais
                                       </label>
                                     </div>
                                     <div id="showdesti">

                                      </div>
                                   </fieldset>
                                   <fieldset class="form-group col-md-6">
                                     <h5>Port :</h5>
                                     <div class="form-check">
                                       <label class="form-check-label">
                                         <input type="radio" class="form-check-input pay" name="port" id="P" value="P" checked>
                                         Payé
                                       </label>
                                     </div>
                                     <div class="form-check">
                                       <label class="form-check-label">
                                         <input type="radio" class="form-check-input pay" name="port" id="D" value="D">
                                         Dû
                                       </label>
                                     </div>
                                   </fieldset>
                                 </div>
                                 <div class="respr col-md-6" style="background-color:#E7E6E6; margin:1px; padding: 5px;border-radius:5px;">

                                 </div>
                                 <div class="form-row">
                                     <fieldset class="form-group  col-md-6">
                                       <h5>Produits et service :</h5>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input typ" name="courrier_typ" id="M" value="M" checked>
                                           Messagerie
                                         </label>
                                       </div>
                                       <div class="mess" style="border: 1px solid black;
                                       border-radius:5px;
                                       padding-left:15px;">
                                         <fieldset class="form-group col-md-6">
                                         <div class="col-12">
                                           <div class="form-check">
                                             <label class="form-check-label">
                                               <input type="radio"  class="form-check-input" value="S" name="typliv"  id="simple" checked>Simple
                                             </label>
                                           </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="radio"  class="form-check-input" value="X" name="typliv"  id="express" >Express
                                            </label>
                                          </div>
                                         </div>
                                         </fieldset>
                                       </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input typ" name="courrier_typ" id="affrtmnt" value="L">
                                           Affrêtement
                                         </label>
                                       </div>
                                       <div class="affret">
										<div class="aff" style="border: 1px solid black;
                                         border-radius:5px;
                                         padding-left:15px;">
                                           <div class="form-check">
                                             <label class="form-check-label">
                                               <input type="radio" class="form-check-input affrt" name="affrettyp" id="25" value="25" checked>
                                               25t
                                             </label>
                                           </div>
                                           <div class="form-check">
                                             <label class="form-check-label">
                                               <input type="radio" class="form-check-input affrt" name="affrettyp" id="14" value="14">
                                               14t
                                             </label>
                                           </div>
                                           <div class="form-check">
                                             <label class="form-check-label">
                                               <input type="radio" class="form-check-input affrt" name="affrettyp" id="5" value="5">
                                               5t
                                             </label>
                                           </div>
                                           <div class="form-check">
                                             <label class="form-check-label">
                                               <input type="radio" class="form-check-input affrt" name="affrettyp" id="U" value="U">
                                               Utilitaires
                                             </label>
                                           </div>

                                         </div>
                                       </div>
                                     </fieldset>
                                     <fieldset class="form-group col-md-6">
                                       <h5>Nature marchandises :</h5>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input natu" name="nature" id="Normal" value="Normal" checked>
                                           Normal
                                         </label>
                                       </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                            <input type="radio" class="form-check-input natu" name="nature" id="Fragile" value="Fragile">
                                            Fragile
                                         </label>
                                       </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input natu" name="nature" id="Très fragile" value="Très fragile">
                                           Très fragile
                                         </label>
                                       </div>
                                     </fieldset>
                                  </div>
                              </div>
                            </div>
                              <div class="card">
                                <div class="card-header">
                                  <h4> <b>4) Dimensions</b> </h4>
                                </div>
                                <div class="card-body">
                                  <h5>Dimensions en (cm)</h5>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <label for="">Longueur</label>
                                      <input type="text" class="form-control dim" name="long" id="long" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="">Largeur</label>
                                      <input type="text" class="form-control dim" name="larg" id="larg" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="">Hauteur</label>
                                      <input type="text" class="form-control dim" name="haut" id="haut" value="">
                                    </div>
                                  </div>

                                </div>
                              </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card">
                            <div class="card-header">
                              <h4><b>5) Taxe Ad valorem</b> </h4>
                            </div>
                            <div class="card-body">
                              <div class="form-group col-md-12">
                                <label for="">Valeur déclarée</label>
                                <input type="text" class="form-control form-control-sm text-right" name="valeur" placeholder="100.00" id="valeur">
                              </div>
                            </div>
                          </div>
                            <div class="card">
                              <div class="card-header">
                                <h4><b>6) Retour de fonds</b> </h4>
                              </div>
                              <div class="card-body">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="">Espèces (MAD)</label>
                                    <input type="text" placeholder="0.00" class="form-control form-control-sm text-right" name="Espece" id="Espece">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="">Chèque (MAD)</label>
                                    <input type="text" placeholder="0.00" class="form-control form-control-sm text-right" name="Cheque" id="Cheque">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="">Traite</label>
                                    <input type="text" placeholder="0.00" class="form-control form-control-sm text-right" name="Traite" id="Traite">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="">Retour BL:</label>
                                    <div class="form-row">
                                      <div class="form-check">
                                        <label class="form-check-label"style="margin-left: 10px;">
                                           <input type="radio" class="form-check-input BLstat" checked name="BLstat" id="blnon" value="Non">
                                           Non
                                        </label>
                                      </div>
                                      <div class="form-check" style="margin-left: 10px;">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input BLstat" name="BLstat" id="bloui" value="Oui">
                                          Oui
                                        </label>
                                      </div>
                                    </div>
                                    <div class="form-group" id="blocbl">
                                      <label for="BL">Nombre de BL</label>
                                      <div class="form-row">
                                        <input type="text" class="form-control form-control-sm col-8" name="nbBL" id="BL">
                                        <button type="button" id="affichemodalbl" class="btn btn-primary col-2" data-toggle="modal" data-target="#modalBL" style="height: 30.99;margin-left: 10px;">...</button>
                                      </div>
                                    </div>
                                    <div class="form-group" id="blocnumsbl">
                                      <label for="BL">Numéro de BL</label>
                                      <input type="text" class="form-control" id="numsbl" name="BL" value="">

                                    </div>

                                  </div>
                                </div>


                                <!-- Modal du BL -->
                                <div class="modal fade" id="modalBL" tabindex="-1" role="dialog" aria-labelledby="modalBLLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalBLLabel">Numero de BL</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="blres">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="validBL">valider</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
							<!-- Fin Modal du BL -->

                            </div>
                        </div>
                        <div class="card">
                          <div class="card-header">
                             <h4> <b>7) Retour palettes</b> </h4>
                          </div>
                          <div class="card-body">
						             <div class="form-row">
                                      <div class="form-check">
                                        <label class="form-check-label"style="margin-left: 10px;">
                                           <input type="radio" class="form-check-input palstat" checked name="palstat" id="palnon" value="Non">
                                           Non
                                        </label>
                                      </div>
                                      <div class="form-check" style="margin-left: 10px;">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input palstat" name="palstat" id="paloui" value="Oui">
                                          Oui
                                        </label>
                                      </div>
                                    </div>
							<div id="typpalet">
							<h5>Type de palettes :</h5>
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="">800 * 1200</label>
                                  <input type="text" name="paletteA" class="form-control palet">
                                </div>
                              <div class="form-group col-md-4">
                                <label for="">1000 * 1200</label>
                                  <input type="text" name="paletteB" class="form-control palet">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="">1200 * 1200</label>
                                    <input type="text" name="paletteC" class="form-control palet">
                                  </div>
                            </div>
							</div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-success btn-block btn-lg" name="declarer" value="Confirmer la déclaration">
            </form>
           <!--##############################################***************FIN FORM******************##################################################################-->
        </div>
        <div class="col-10 agdiv" >
          <div class="card"><div class="card-header">
              <h4><b>Nos agences</b>  </h4>
            </div>
            <div class="card-body agclass" style="height:800px; overflow-y: scroll">
              <table class="table table-striped" >
                <tr>
                  <td>Agence</td>
                  <td>Adresse</td>
                  <td>Tél.</td>
                </tr>
                <?php foreach ($nosagences as $nagences): ?>
                <tr>
                  <td><?=$nagences['AGENCE_LIB'];?></td>
                  <td><?=$nagences['AGENCE_ADRESSE'];?></td>
                  <td><?=$nagences['AGENCE_TEL'];?></td>
                </tr>
                  <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
		<div class="col-10 vildes" >
          <div class="card"><div class="card-header">
              <h4><b>Nos Villes Desservies</b>  </h4>
            </div>
            <div class="card-body desclass" style="height:800px; overflow-y: scroll">
			 <div class="col-12">
			 <div class="row">
         Ville: <input type="text" class="form-control" id="libvi" name="" value="">
         <div class="vilclass">

         </div>
				 </div>
				</div>
            </div>
          </div>
        </div>
        <div class="col-2">
          <button type="button" style="background-color: #A9A9A9;color: #3F3F3F;border:0;" id="buttag" class="btn btn-block btn-lg mainbtn" name="button"> <i class="fas fa-store fa-5x"></i> <br> <b>Nos Agences</b> </button>
		 <a type="button" style="text-decoration: none;background-color: #A9A9A9;color: #3F3F3F;border:0;" href="assets/delais_livraison.pdf" download class="btn btn-block btn-lg mainbtn" name="button"> <i class="fas fa-city fa-5x"></i> <br> <b>Nos Villes Desservies</b> </a>
         <button type="button" style="background-color: #A9A9A9;color: #3F3F3F;border:0;" id="" class="btn btn-block btn-lg mainbtn" name="button" hidden> <i class="fas fa-store fa-5x"></i><br> <b>Nos Points Relais</b> </button>
        </div>
      </div>
      <!--######################################******************* form ********************#############################################-->

      <!--######################################******************* end form ********************#############################################-->
      <!--######################################******************* LISTE DES DECLARATIONS ********************#############################################-->
      <div class="row">
        <div class="col-12">
          <div class="card" >
            <div class="card-header">
               <label class="col-11"><h4> <b>Liste des déclarations non-ramassées</b> </h4></label>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <form class="maform">
                    <div class="form-group">
                      <label for="">Date de ramassage</label>
                      <input type="date" class="form-control" id="datram" name="" value="<?= date('Y-m-d'); ?>">
                    </div>
                    <button type="button" class="btn btn-success" id="ramass" name="button">Créer le carnet de ramassage</button>
                    </form>

                  </div>
                  <div class="col-8" style="margin-bottom:10px;">
                    <p class="h4" style="border: 1px solid red;border-radius:5px;padding:10px;">
                      <b>Note: </b><br>Avant de créer le carnet de ramassage, il faut d'abord selectionner les déclarations à ajouter au carnet à partir du tableau ci-dessous.
                    </p>
                  </div>
                </div>
              <div class="form-group">

              <table class="table table-striped table-sm table-responsive table-bordered">
                <thead class="table-secondary">
                  <tr>
                    <td >
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox"  class="form-check-input" id="checkAll" >Ramasser
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </td>
                    <td >Numéro</td>
                    <td >Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >Colis</td>
                    <td >Valeur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >Destinataire</td>
                    <td >Livraison&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >Express</td>
                    <td >Port</td>
                    <td >Courrier</td>
                    <td >Nature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >Espèces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >Chèque&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >Traite&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >BL</td>
                    <td >Adresse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td >Actions</td>
                  </tr>
                </thead>
              <?php if (!empty($list_dec)) {
              foreach ($list_dec as $row_list_dec) {
                if ($row_list_dec['express']=="X") {
                  $expr = "Oui";
                }else {
                  $expr = "Non";
                }
                if ($row_list_dec['livraison'] == "D") {
                  $livr = "À domicile";
                }elseif ($row_list_dec['livraison'] == "p") {
                  $livr = "Points relais";
                }else {
                  $livr = "En gare";
                }
                if ($row_list_dec['courrier_typ'] == "M") {
                  $typcr = "Messagerie";
                }elseif ($row_list_dec['courrier_typ'] == "25") {
                  // code...
                  $typcr = "Affrêtement 25T";
                }elseif ($row_list_dec['courrier_typ'] == "14") {
                    $typcr = "Affrêtement 14T";
                }elseif ($row_list_dec['courrier_typ'] == "5") {
                    $typcr = "Affrêtement 5T";
                }elseif ($row_list_dec['courrier_typ'] == "U") {
                    $typcr = "Affrêtement utilitaires";
                }
                if ($row_list_dec['port'] == "P") {
                  $prt = "Payé";
                }else{
                  $prt = "Du";
                }
                ?>
                <tr>
                  <td class="text-center"> <input type="checkbox" name="numexramassage" class="numexramassage" value="<?= $row_list_dec['numero']; ?>"> </td>
                  <td><?= $row_list_dec['numero']; ?></td>
                  <td><?=date('d/m/Y',strtotime($row_list_dec['date'])); ?></td>
                  <td><?= $row_list_dec['colis']; ?></td>
                  <td class="text-right"><?= number_format($row_list_dec['valeur'], 2, ',', ' '); ?></td>
                  <td><?= strtoupper($clients->clientID($row_list_dec['client2_id'])); ?></td>
                  <td><?= $livr; ?></td>
                  <td><?= $expr;?></td>
                  <td><?= $prt; ?></td>
                  <td><?= $typcr; ?></td>
                  <td><?= $row_list_dec['nature']; ?></td>
                  <td class="text-right"><?= number_format($row_list_dec['Espece'], 2, ',', ' '); ?></td>
                  <td class="text-right"><?= number_format($row_list_dec['Cheque'], 2, ',', ' '); ?></td>
                  <td class="text-right"><?= number_format($row_list_dec['Traite'], 2, ',', ' '); ?></td>
                  <td><?= $row_list_dec['BL']; ?></td>
                  <td><?=ucfirst($adresses->IDAdresse($row_list_dec['id_adres']));?></td>
                  <td>
                    <div class="row" style="margin-left:2px;">


                    <button class="btn btn-primary" id="modifier" data-toggle="modal" data-target="#modmodal-<?= $row_list_dec['numero']; ?>"> <span><i class="fas fa-edit"></i></span> </button>
                    <!--////////////////////////////////////////////////////////////////////////////////-->
                    <div class="modal modmodal " tabindex="-1" role="dialog" id="modmodal-<?= $row_list_dec['numero']; ?>">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modifier la declaration</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form autocomplete="off" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                              <input type="hidden" name="mnumero"  id="mnumero" value="<?= $row_list_dec['numero']; ?>">
                              <div class="form-row">
                               <div class="form-group col-md-12">
                                  <label for="date2" class="col-form-label">Date</label>
                                  <input class="form-control" type="date" name="mdate" value="<?=$row_list_dec['date']; ?>" id="mdate2">
                               </div>
                              </div>
                              <div class="card">
                                <div class="card-header">
                                  Destinataire
                                </div>
                                <div class="card-body">
                                  <div class="form-row">
                                   <div class="form-group col-md-6">
                                     <label for="client" class="col-form-label">Code client</label>
                                     <input type="text" id="mclient" class="form-control" name="mclient" value="<?=$clients->IDtoCOD($row_list_dec['client2_id']);?>">
                                   </div>
                                 </div>
                                   <div class="form-row">
                                     <div class="form-group col-md-6">
                                     <label for="mmodnom">Nom</label>
                                     <input type="text" id="mmodnom" class="form-control" name="mmodnom" value="<?=$clients->CODNOM($clients->IDtoCOD($row_list_dec['client2_id']));?>">
                                     </div>
                                     <div class="form-group col-md-6">
                                     <label for="mmodpre">Prenom</label>
                                     <input type="text" id="mmodpre" class="form-control" name="mmodprenom" value="<?=$clients->CODPRENOM($clients->IDtoCOD($row_list_dec['client2_id']));?>">
                                     </div>
                                   </div>
                                   <div class="form-group">
                                   <label for="mmodadr">Adresse</label>
                                   <input type="text" id="mmodadr" class="form-control" name="mmodadresse" value="<?=$adresses->IDAdresse($row_list_dec['id_adres']);?>">
                                   </div>
                                   <div class="form-row">
                                     <div class="form-group col-md-6">
                                       <label for="mmodvil">Ville</label>
                                       <input type="text" id="mmodvil" class="form-control" name="mmodville" value="<?=$villes->IDVille($adresses->VilleAdresse($row_list_dec['id_adres']));?>">
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label for="mmodtel">Telephone</label>
                                       <input type="text" id="mmodtel" class="form-control" name="mmodtelephone" value="<?=$clients->CODTEL($clients->IDtoCOD($row_list_dec['client2_id']));?>">
                                     </div>
                                   </div>
                                </div>
                              </div>
                            <div class="card">
                              <div class="card-header">
                                Livraison
                              </div>
                              <div class="card-body">
                                <div class="form-row">
                                 <div class="form-group col-md-6">
                                    <label for="mcolis" class="col-4 col-form-label">Colis:</label>
                                    <input class="form-control" type="number" min="0" step="1" name="mcolis"  id="mcolis" value="<?= $row_list_dec['colis']; ?>">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="mpoids" class="col-4 col-form-label">Poids:</label>
                                    <input class="form-control" type="text" min="0"    name="mpoids"  id="mpoids" value="<?= $row_list_dec['poids']; ?>">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <fieldset class="form-group col-md-6">
                                    <?php
                                    if ($row_list_dec['express']=="X") {
                                      $checkedex = "checked";
                                      $checkedsimple = "";
                                    }else {
                                      $checkedsimple = "checked";
                                      $checkedex = "";
                                    }
                                     ?>
                                  <h5>Type de livraison :</h5>
                                  <div class="col-12">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio"  class="form-check-input" value="S" name="typliv"  id="simple" <?=$checkedsimple;?> >Simple
                                      </label>
                                    </div>
                                   <div class="form-check">
                                     <label class="form-check-label">
                                       <input type="radio"  class="form-check-input" value="X" name="typliv"  id="express" <?=$checkedex;?> >Express
                                     </label>
                                   </div>
                                  </div>
                                  </fieldset>
                                   <fieldset class="form-group  col-md-4">
                                     <?php if ($row_list_dec['livraison']=="G"){
                                       $gchecked = "checked";
                                       $pchecked = "";
                                       $dchecked = "";
                                     }elseif ($row_list_dec['livraison']=="P") {
                                       $pchecked = "checked";
                                       $gchecked = "";
                                       $dchecked = "";
                                     }else {
                                       $dchecked="checked";
                                       $gchecked = "";
                                       $pchecked = "";
                                     }
                                      ?>
                                     <legend>Livraison</legend>
                                       <div class="form-check">
                                       <label class="form-check-label">
                                        <input type="radio" class="form-check-input livr" name="mlivraison" id="mG" value="G"  <?=$gchecked;?> >
                                        En gare
                                       </label>
                                     </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input livr" name="mlivraison" id="mD" value="D" <?=$dchecked;?> >
                                           à domicile
                                         </label>
                                       </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input livr" disabled name="livraison" id="Pr" value="p" <?=$pchecked;?> >
                                           Points relais
                                         </label>
                                       </div>
                                   </fieldset>
                                   <fieldset class="form-group  col-md-2">
                                     <legend>Port</legend>
                                     <?php if ($row_list_dec['port']=="P"){
                                       $pochecked = "checked";
                                       $duchecked = "";
                                     }else {
                                       $duchecked = "checked";
                                       $pochecked = "";
                                     }
                                     ?>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input pay" name="mport" id="mP" value="P" <?=$pochecked;?> >
                                           Payé
                                         </label>
                                       </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input pay" name="mport" id="mD" value="D" <?=$duchecked;?> >
                                           Dû
                                         </label>
                                       </div>
                                   </fieldset>
                                 </div>
                                 <div class="form-row">
                                     <fieldset class="form-group  col-md-6">
                                       <?php
                                       if ($row_list_dec['courrier_typ']=="M") {
                                         $mchecked = "checked";
                                         $lchecked = "";
                                       }else {
                                         $lchecked = "checked";
                                         $mchecked = "";
                                       }
                                        ?>
                                       <legend>Type déclaration :</legend>
                                         <div class="form-check">
                                           <label class="form-check-label">
                                             <input type="radio" class="form-check-input typ" name="mcourrier_typ" id="mM" value="M" <?=$mchecked;?>>
                                             Messagerie
                                           </label>
                                         </div>
                                         <div class="form-check">
                                           <label class="form-check-label">
                                             <input type="radio" class="form-check-input typ" name="mcourrier_typ" id="mL" value="L" <?=$lchecked;?>>
                                             Affrêtement
                                           </label>
                                         </div>
                                     </fieldset>

                                     <fieldset class="form-group col-md-6">
                                       <?php
                                         if ($row_list_dec['nature']=="Normal") {
                                           $norchecked = "checked";
                                           $fragchecked = "";
                                           $trgchecked = "";
                                         }elseif ($row_list_dec['nature']=="Fragile") {
                                           $fragchecked = "checked";
                                           $norchecked = "";
                                           $trgchecked = "";
                                         }else {
                                         $trgchecked = "checked";
                                         $fragchecked = "";
                                         $norchecked = "";
                                         }
                                        ?>
                                       <legend>Nature marchandises :</legend>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input natu" name="mnature" id="mNormal" value="Normal" <?=$norchecked;?>>
                                           Normal
                                         </label>
                                       </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                            <input type="radio" class="form-check-input natu" name="mnature" id="mFragile" value="Fragile" <?=$fragchecked;?>>
                                            Fragile
                                         </label>
                                       </div>
                                       <div class="form-check">
                                         <label class="form-check-label">
                                           <input type="radio" class="form-check-input natu" name="mnature" id="mTrès fragile" value="Très fragile" <?=$trgchecked;?>>
                                           Très fragile
                                         </label>
                                       </div>
                                     </fieldset>
                                  </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header">
                                Dimensions
                              </div>
                              <div class="card-body">
                                <h5>Dimensions en (cm)</h5>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label for="">Longueur</label>
                                    <input type="text" class="form-control" name="mlong" value="<?= $row_list_dec['longueur']; ?>">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="">Largeur</label>
                                    <input type="text" class="form-control" name="mlarg" value="<?= $row_list_dec['largeur']; ?>">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="">Hauteur</label>
                                    <input type="text" class="form-control" name="mhaut" value="<?= $row_list_dec['hauteur']; ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header">
                                Taxe advaleurime
                              </div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="mvaleur" class="col-form-label">Valeur declarée</label>
                                  <input class="form-control" type="text" min="0"   name="mvaleur" id="mvaleur" value="<?=$row_list_dec['valeur'];?>">

                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header">
                                Retour de fonds
                              </div>
                              <div class="card-body">
                                <div class="form-row">
                                  <div class="form-group col-6">
                                    <label for="mEspece" class="col-form-label">Especes:</label>
                                    <input class="form-control" type="text" min="0"   name="mEspece" id="mEspece" value="<?=$row_list_dec['Espece'];?>">

                                  </div>
                                  <div class="form-group col-6">
                                    <label for="mCheque" class="col-form-label">Chèque:</label>
                                    <input class="form-control" type="text" min="0"   name="mCheque" id="mCheque" value="<?=$row_list_dec['Cheque'];?>">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-6">
                                    <label for="mTraite" class=" col-form-label">Traite:</label>
                                    <input class="form-control" type="text" min="0"   name="mTraite" id="mTraite" value="<?=$row_list_dec['Traite'];?>">
                                  </div>
                                  <div class="form-group col-6">
                                    <label for="mBL" class=" col-form-label">BL:</label>
                                    <input class="form-control" type="text" name="mBL" id="mBL" value="<?=$row_list_dec['BL'];?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header">
                                 Retour palettes
                              </div>
                              <div class="card-body">
                                <h5>Type de palettes :</h5>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label for="">800 * 1200</label>
                                      <input type="text" name="mpaletteA" class="form-control" value="<?=$row_list_dec['paletteA'];?>">
                                    </div>
                                  <div class="form-group col-md-4">
                                    <label for="">1000 * 1200</label>
                                      <input type="text" name="mpaletteB" class="form-control" value="<?=$row_list_dec['paletteB'];?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="">1200 * 1200</label>
                                        <input type="text" name="mpaletteC" class="form-control" value="<?=$row_list_dec['paletteC'];?>">
                                      </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary" name="modif">Modifier</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  </td>
                </tr>
              <?php   }
            }?>
            </table>
            </div>
          </div>
        </div>
      </div>
      <!--######################################******************* FIN LISTE DES DECLARATIONS ********************#############################################-->
    </div>
    <!--######################################******************* END MAIN container ********************#############################################-->
    <hr>
    <div class="container" id="foot">
      <div class="row">
         <div class="text-center col-lg-6 offset-lg-3">
            <p><span style="font-size: 8pt;">LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc; &ndash; Casablanca</span><br /><span style="font-size: 8pt;">RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073</span><br /><span style="font-size: 8pt;">T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 </span><br /><span style="font-size: 8pt;">Site : <a href="http://www.lavoieexpress.com">www.lavoieexpress.com</a> &ndash; E-mail ; client@lavoieexpress.ma </span><br /><span style="font-size: 8pt;">La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur. Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet. </span></p>
         </div>
      </div>
    </div>

    <script type="text/javascript">

    $(document)
    .ready(function(){
      $('#codecli').focus();
      $('#codecli').val('');
      $('.agdiv').hide();
      $('#showdesti').hide();
	  $('.vildes').hide();
      $('.respr').hide();
      $('#blocbl').hide();
	  $('.affret').hide();
      $('#blocnumsbl').hide();
	  $('#typpalet').hide();
      showag();
    vildess();
    //VilleEnGare();
      afficheaffretement();
	  affichepalettes();
      Nomsuggestions();
      emtyNomsuggestions();
      codeVille();
      VilleEnGare();
      //Agenceetponitsrelais();
      Afficherpr();
      DemandeRamassage();
      CheckRamassage();
      AfficheBLoui();
      AfficheBLmodal();
      ValideBL();
      novillesdiv();
      vildl();
    })
      .on('click', '.mtr', function(){
           $('.nom').val($('tr>td:first').text());
           $('#codecli').val($(this).find('td:last').text());
           afficheinfoclient();
           $('.segg').fadeOut();
      });
	  	$('.mainbtn').on('mouseover',function(){
		$(this).css("background-color","gainsboro");
		})
		.on('mouseleave',function(){
			$(this).css("background-color","#A9A9A9");
    });
    /*
    *
    */
    /*$('.livr').on('change',function(){
    var code = $('#ville').val();
    if ($("#G").is(":checked") && code != "") {
      console.log(code);
    }
  });*/
    </script>
  </body>
</html>
