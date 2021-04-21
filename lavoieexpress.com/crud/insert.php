<?php
$db = new mysqli('localhost', 'root', '', 'site_voieex_test');
$statusMsg = '';

// emplacement d' "upload" du fichier
$targetDir = "../assets/cvs/";
$fileName = basename($_FILES["cv"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if (isset($_POST['candidature'])) {
  if (!empty($_FILES["cv"]["name"])) {
    $typedemande = $_POST['typedemande'];
    $affectation = $_POST['affectation'];
    $situatF = $_POST['situatF'];
    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $nationalite = $_POST['nationalite'];
    $datenais = $_POST['datenais'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $situatP = $_POST['situatP'];
    $experience = $_POST['experience'];
    $niveau_etude = $_POST['niveau_etude'];
    $etablissement = $_POST['etablissement'];
    $formation = $_POST['formation'];
    $motivations = $_POST['motivations'];

    $allowTypes = array('pdf','doc','docx');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePath)){

            // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = " Votre candidature à été bien validée.";
            }else{
                $statusMsg = "Erreur de chargement du fichier.";
            }
        }else{
            $statusMsg = "Problème en chargement de fichier merci d'esseyer à nouveau.";
        }
    }else{
        $statusMsg = 'Seul les formats PDF,DOC, et DOCX qui sont autorisés.';
    }
  }else{
    $statusMsg = 'Merci de selectionner votre CV.';
  }
  echo $statusMsg;
}

if (isset($_POST['envoie_Reclamation'])) {
$client = $_POST['client'];
$codeClient = $_POST['codeClient'];
$telFix = $_POST['telFix'];
$telGSM = $_POST['telGSM'];
$nDeclaration = $_POST['nDeclaration'];
$expediteur = $_POST['expediteur'];
$recTypeObjet = $_POST['recTypeObjet'];
$recObjet = $_POST['recObjet'];
}

if (isset($_POST['ajout_offre'])) {

/*INSERT INTO `offres_d_emploi`(`id_offre`, `presentation`, `presentation_mission`, `missions`, `profil`, `disponibilite`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
*/





}
?>
