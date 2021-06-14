<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FeuillesImport implements WithMultipleSheets
{

    public function  __construct($nom_fichier)
    {
        $this->nom_fichier= $nom_fichier;
    }

    public function sheets(): array
    {
       // dd($this->nom_fichier);
        return [
            0 => new FirstSheetImport($this->nom_fichier),
            1 => new SecondSheetImport($this->nom_fichier),
        ];
    }
}
