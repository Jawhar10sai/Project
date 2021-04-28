<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use \PhpOffice\PhpSpreadsheet\Style\Font;

class Courrier
{
    function __construct()
    {
    }
    static function  Utf8_ansi($valor = '')
    {
        $utf8_ansi2 = array(
            "\u00c0" => "À",
            "\u00c1" => "Á",
            "\u00c2" => "Â",
            "\u00c3" => "Ã",
            "\u00c4" => "Ä",
            "\u00c5" => "Å",
            "\u00c6" => "Æ",
            "\u00c7" => "Ç",
            "\u00c8" => "È",
            "\u00c9" => "É",
            "\u00ca" => "Ê",
            "\u00cb" => "Ë",
            "\u00cc" => "Ì",
            "\u00cd" => "Í",
            "\u00ce" => "Î",
            "\u00cf" => "Ï",
            "\u00d1" => "Ñ",
            "\u00d2" => "Ò",
            "\u00d3" => "Ó",
            "\u00d4" => "Ô",
            "\u00d5" => "Õ",
            "\u00d6" => "Ö",
            "\u00d8" => "Ø",
            "\u00d9" => "Ù",
            "\u00da" => "Ú",
            "\u00db" => "Û",
            "\u00dc" => "Ü",
            "\u00dd" => "Ý",
            "\u00df" => "ß",
            "\u00e0" => "à",
            "\u00e1" => "á",
            "\u00e2" => "â",
            "\u00e3" => "ã",
            "\u00e4" => "ä",
            "\u00e5" => "å",
            "\u00e6" => "æ",
            "\u00e7" => "ç",
            "\u00e8" => "è",
            "\u00e9" => "é",
            "\u00ea" => "ê",
            "\u00eb" => "ë",
            "\u00ec" => "ì",
            "\u00ed" => "í",
            "\u00ee" => "î",
            "\u00ef" => "ï",
            "\u00f0" => "ð",
            "\u00f1" => "ñ",
            "\u00f2" => "ò",
            "\u00f3" => "ó",
            "\u00f4" => "ô",
            "\u00f5" => "õ",
            "\u00f6" => "ö",
            "\u00f8" => "ø",
            "\u00f9" => "ù",
            "\u00fa" => "ú",
            "\u00fb" => "û",
            "\u00fc" => "ü",
            "\u00fd" => "ý",
            "\u00ff" => "ÿ"
        );
        return strtr($valor, $utf8_ansi2);
    }
    public static function TrouverCourrierParNumero($numero)
    {
        $connection = new PDO("mysql:dbname=lvedbexp;host=localhost", 'lve', 'adminlvedba');
        $result =     $connection->prepare("SELECT * FROM `etat_expedition` WHERE `Numero`=?");
        return ($result->execute([$numero])) ? $result->fetch(PDO::FETCH_OBJ) : false;
    }

    public static function TrouverCourrier($id)
    {
        $connection = new PDO("mysql:dbname=lvedbexp;host=localhost", 'lve', 'adminlvedba');
        $result =     $connection->prepare("SELECT * FROM `etat_expedition` WHERE `courrier_id`=?");
        return ($result->execute([$id])) ?  $result->fetch(PDO::FETCH_OBJ) : false;
    }

    public static function TrouverCourrierClient($id, $client)
    {
        $connection = new PDO("mysql:dbname=lvedbexp;host=localhost", 'lve', 'adminlvedba');
        $result =   $connection->prepare("SELECT * FROM `etat_expedition` WHERE `courrier_id`=? AND Code1=?");
        return ($result->execute([$id, $client])) ? $result->fetch(PDO::FETCH_OBJ) : false;
    }

    public static function CourrierToJSON($client, $liste_courrier)
    {
        $dec_liv = 0;
        $dec_enc = 0;
        $dec_ret = 0;
        $donnees = array();
        foreach ($liste_courrier as $trackdec) {
            if ($client == 15038 || $client == 9588) {
                $ndset = explode(' - ', $trackdec->destinataire);
                if (!isset($ndset[1])) {
                    $ndset[1] = $ndset[0];
                    $ndset[0] = $trackdec->Code2;
                }
                $Code2 = $ndset[0];
                $destinataire = $ndset[1];
            } else {
                $destinataire  = $trackdec->destinataire;
            }
            $donnees[] = array(
                'Agence' => $trackdec->Agence,
                'courrier_id' => $trackdec->courrier_id,
                'Numero' => $trackdec->Numero,
                'Date' => $trackdec->Date,
                'Code1' => $trackdec->Code1,
                'Expediteur' => utf8_encode($trackdec->Expediteur),
                'Code2' => $Code2,
                'destinataire' => utf8_encode($destinataire),
                'adresse1' => utf8_encode($trackdec->adresse1),
                'adresse2' => utf8_encode($trackdec->adresse2),
                'Ville1' => utf8_encode($trackdec->Ville1),
                'Ville2' => utf8_encode($trackdec->Ville2),
                'Port' => $trackdec->Port,
                'Colis' => $trackdec->Colis,
                'Poids' => $trackdec->Poids,
                'type' => $trackdec->type,
                'Montant_ttc' => $trackdec->Montant_ttc,
                'Espece' => $trackdec->Espece,
                'Cheque' => $trackdec->Cheque,
                'Traite' => $trackdec->Traite,
                'bl' => $trackdec->bl,
                'Recu' => $trackdec->Recu,
                'date_recu' => $trackdec->date_recu,
                'num' => $trackdec->num,
                'date_bordereau' => $trackdec->date_bordereau,
                'date_livraison' => $trackdec->date_livraison,
                'Delais_Cible' => $trackdec->Delais_Cible,
                'Ecart' => $trackdec->Ecart,
                'Depassement' => $trackdec->Depassement,
                'Ecart2' => $trackdec->Ecart2,
                'service' => $trackdec->service,
                'BORDEREAU_NUM' => $trackdec->BORDEREAU_NUM,
                'livraison' => $trackdec->livraison,
                'ramasseur' => $trackdec->ramasseur,
                'FC_date1' => $trackdec->FC_date1,
                'FC_date2' => $trackdec->FC_date2,
                'date_caisse' => $trackdec->date_caisse,
                'statut' => utf8_encode($trackdec->statut),
                'statut_suivis' => utf8_encode($trackdec->statut_suivis),
                'FC_date_arrive' => $trackdec->FC_date_arrive,
                'Motif' => utf8_encode($trackdec->Motif),
                'Taxateur' => $trackdec->Taxateur
            );

            if (utf8_encode($trackdec->statut_suivis) == 'Livrée')
                $dec_liv += 1;
            elseif (utf8_encode($trackdec->statut_suivis) == 'Retournée')
                $dec_enc += 1;
            else
                $dec_ret += 1;
        }
        $donnees = json_encode($donnees);
        $cap = array(
            'dec_liv' => $dec_liv,
            'dec_enc' => $dec_enc,
            'dec_ret' => $dec_ret
        );
        return (file_put_contents($client . "excel_tracking.json", $donnees)) ? $cap : false;
    }

    public static function ExporterCourrierClient($client, $nom, $declarations)
    {
        switch ($client) {
            case '9588':
                $bl = 'ILOT';
                $destination = 'City';
                $adress_dest = 'Address';
                $code_dest = 'Retailer';
                $alph = 'K';
                break;
            case '15038':
                $code_dest = 'Code détaillant';
                $alph = 'J';
                break;
            case '362':
                $alph = 'K';
                break;
            default:
                $bl = 'BL';
                $destination = 'Ville';
                $adress_dest = 'Adresse';
                $alph = 'I';
                break;
        }
        require_once "vendor/autoload.php";
        $file = new Spreadsheet();

        $active_sheet = $file->getActiveSheet();
        #Border the file.
        $active_sheet
            ->getStyle('A1:' . $alph . count($declarations) + 1)
            ->getBorders()
            ->getInside()
            ->setBorderStyle(Border::BORDER_THIN);
        $active_sheet
            ->getStyle('A1:' . $alph . count($declarations) + 1)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_THIN);
        $active_sheet
            ->getStyle('A1:' . $alph . '1')
            ->getFont()
            ->setBold(true);
        $active_sheet->getStyle('A1:H1')->getAlignment()->setHorizontal('center');
        $active_sheet->setCellValue('A1', 'Déclaration');
        $active_sheet->getColumnDimension('A')->setAutoSize(true);
        $active_sheet->setCellValue('B1', "Date d'expédition");
        $active_sheet->getColumnDimension('B')->setAutoSize(true);
        $active_sheet->setCellValue('C1', 'Date de livraison');
        $active_sheet->getColumnDimension('C')->setAutoSize(true);
        $active_sheet->setCellValue('D1', 'Statut de livraison');
        $active_sheet->getColumnDimension('D')->setAutoSize(true);
        $active_sheet->setCellValue('E1', 'Motif de non-livraison/retard');
        $active_sheet->getColumnDimension('E')->setAutoSize(true);
        $active_sheet->setCellValue('F1', $bl);
        $active_sheet->getColumnDimension('F')->setAutoSize(true);
        $active_sheet->setCellValue('G1', $destination);
        $active_sheet->getColumnDimension('G')->setAutoSize(true);
        $active_sheet->setCellValue('H1', $adress_dest);
        $active_sheet->getColumnDimension('H')->setAutoSize(true);
        $active_sheet->setCellValue('I1', 'Destinataire');
        $active_sheet->getColumnDimension('I')->setAutoSize(true);
        #Conditions demandées par intralot et Sisal
        if ($client == '9588' || $client == '15038') {
            $active_sheet->setCellValue('J1', $code_dest);
            $active_sheet->getColumnDimension('J')->setAutoSize(true);
            if ($client == '9588') {
                $active_sheet->setCellValue('K1', 'Date prévue de livraison');
                $active_sheet->getColumnDimension('K')->setAutoSize(true);
            } elseif ($client == '362') {
                $active_sheet->setCellValue('J1', 'Colis');
                $active_sheet->getColumnDimension('J')->setAutoSize(true);
                $active_sheet->setCellValue('K1', 'Poids');
                $active_sheet->getColumnDimension('K')->setAutoSize(true);
            }
        }

        $count = 2;

        foreach ($declarations as $row) {
            $conditions = array('En saisie', 'En preparation', 'Préparée', 'Livrée', 'Retournée');
            $statut = (in_array(self::Utf8_ansi($row['statut_suivis']), $conditions)) ?  self::Utf8_ansi($row['statut_suivis']) : 'En cours';
            $motif = ($statut === "Livrée") ? "" : utf8_encode($value->Motif);
            $active_sheet->setCellValue('A' . $count, self::Utf8_ansi($row["Numero"]));
            $active_sheet->setCellValue('B' . $count, date("d/m/Y", strtotime($row['Date'])));
            $livdate = ($statut === "Livrée" && !empty($row['date_livraison'])) ? date("d/m/Y H:i", strtotime($row['date_livraison'])) : " ";
            $active_sheet->setCellValue('C' . $count, $livdate);
            $active_sheet->setCellValue('D' . $count, $statut);
            $active_sheet->setCellValue('E' . $count, $motif);
            $active_sheet->setCellValue('F' . $count, $row["num"]);
            $active_sheet->setCellValue('G' . $count, self::Utf8_ansi($row["Ville2"]));
            $active_sheet->setCellValue('H' . $count, self::Utf8_ansi($row["adresse2"]));
            $active_sheet->setCellValue('I' . $count, self::Utf8_ansi($row["destinataire"]));
            if ($client == '9588' || $client == '15038') {
                $active_sheet->setCellValue('J' . $count, self::Utf8_ansi($row["Code2"]));
                if ($client == '9588') {
                    $date_prevue = ($statut != 'Livrée') ? date('d/m/Y', strtotime($value->Date . ' +' . $villes->Delais_Cible . ' day')) : '';
                    $active_sheet->setCellValue('K' . $count, $date_prevue);
                }
            } elseif ($client == '362') {
                $active_sheet->setCellValue('K' . $count, $row["Colis"]);
                $active_sheet->setCellValue('K' . $count, $row["Poids"]);
            }
            $count = $count + 1;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xls');

        $file_name = $nom . '_' . time() . '.' . strtolower('xls');

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

        readfile($file_name);

        unlink($file_name);

        exit;
    }

    public static function ListeCourrierClient($client, $client_typ, $date1, $date2, $statut, $type)
    {
        if (empty($date1))
            $date1 = date('Y-m-' . (date('d') - 1));
        if (empty($date2))
            $date2 = date('Y-m-d');

        $where = "WHERE Code1=:code
        AND (Date BETWEEN :date1  AND :date2)";
        $recherche = array(
            ':code' => $client,
            ':date1' => $date1,
            ':date2' => $date2,
        );
        if (!empty($statut)) {
            if ($statut == 'Livrée') {
                $where .= " AND statut_suivis NOT IN ('En cours','Retournée','à Relivrer','.','à Relivrée','Epave','Avarie','')";
            } else {
                $where .= " AND statut_suivis LIKE :statut";
                $recherche[':statut'] = "%$statut%";
            }
        }
        if (!empty($type)) {
            if ($type == "proactif") {
                $where .= " AND ( Numero LIKE :typee OR Numero LIKE :type)";
                $recherche[':typee'] = "F0%";
                $recherche[':type'] = "E0%";
            } else {
                $where .= " AND Numero LIKE :typee";
                $recherche[':typee'] = "C0%";
            }
        }

        $where .= " order by  date_livraison  DESC";
        if ($client_typ == "TRL")
            $stmt = Connection::getCourrierConnexion()->prepare("SELECT * FROM declarations_intralot $where ");
        else
            $stmt = Connection::getCourrierConnexion()->prepare("SELECT * FROM etat_expedition $where ");

        if ($stmt->execute($recherche))
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        else
            return false;
    }
}
