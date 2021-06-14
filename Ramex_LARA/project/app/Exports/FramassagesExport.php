<?php

namespace App\Exports;

use App\Models\Framassage;
use App\Models\Statistic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FramassagesExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'Clients',
            'Lundi',
            'Mardi',
            'Mercredi',
            'Jeudi',
            'Vendredi',
            'Somme',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list_info=Framassage::select('Client','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Somme')->get();
        return $list_info;
        //return Framassage::all();
    }
}
