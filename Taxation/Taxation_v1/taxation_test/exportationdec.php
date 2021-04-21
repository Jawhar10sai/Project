<?php
  session_start();
  include ("classes/conftaxDB.php");
  include ("classes/fetchclas.php");

    $resss = $declarations->mesDeclars($_SESSION['user_id']);
  /*header('Content-Type: application/excel');
  header('Content-Disposition: attachment; filename="' . $fileName . '"');
  $data = array();

  foreach ($resss as $ress) {
    $data[] = $ress;
  }
  $fp = fopen('php://output', 'w');
  foreach ($data as $row) {
      fputcsv($fp, $row);
  }
  fclose($fp);*/

  if (isset($_POST['export'])){
     //$filename = "Export_excel.xls";
       $fileName = 'mes_declarations.xls';
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=\"$fileName\"");
     $isPrintHeader = false;
     if (! empty($resss)) {
         foreach ($resss as $row) {
             if (! $isPrintHeader) {
                 echo implode("\t", array_keys($row)) . "\n";
                 $isPrintHeader = true;
             }
             echo implode("\t", array_values($row)) . "\n";
         }
     }
     exit();
 }

?>
