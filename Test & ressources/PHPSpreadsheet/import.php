<?php

//import.php

include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

if ($_FILES["import_excel"]["name"] != '') {
	$allowed_extension = array('xls', 'csv', 'xlsx');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if (in_array($file_extension, $allowed_extension)) {
		$file_name = time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$data = $spreadsheet->getActiveSheet()->toArray();

		foreach ($data as $row) {
			if ($row[0] == 'First Name')
				continue;
			else {
				$insert_array = array(
					':courrier_id' => $row[0],
					':numero' => $row[1],
					':date' => $row[2],
					':facture_id' => $row[3],
					':client1_id' => $row[4],
					':code_expediteur' => $row[5],
					':expediteur' => $row[6],
					':client2_id' => $row[7],
					':code_destinataire' => $row[8],
					':destinataire' => $row[9],
					':port' => $row[10],
					':courrier_typ' => $row[11],
					':payeur_id' => $row[12],
					':montant_ht' => $row[13]
				);
				$query = "
				INSERT INTO courrier values (:courrier_id,:numero,:date,:facture_id,:client1_id,:code_expediteur,:expediteur,:client2_id,:code_destinataire,:destinataire,:port,:courrier_typ,:payeur_id,:montant_ht)
				";
				/*$insert_data = array(
					':first_name'		=>	$row[0],
					':last_name'		=>	$row[1],
					':created_at'		=>	$row[2],
					':updated_at'		=>	$row[3]
				);

				$query = "
					INSERT INTO sample_datas 
					(first_name, last_name, created_at, updated_at) 
					VALUES (:first_name, :last_name, :created_at, :updated_at)
					";*/

				$statement = $connect->prepare($query);
				$statement->execute($insert_data);
			}
		}
		$message = '<div class="alert alert-success">Data Imported Successfully</div>';
	} else {
		$message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
	}
} else {
	$message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
