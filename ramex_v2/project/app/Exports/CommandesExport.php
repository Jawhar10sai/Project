<?php

namespace App\Exports;

use App\Models\Commande;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CommandesExport implements FromQuery,WithHeadings
{


    public function headings():array{
        return[
            'date_saisie',
            'nom_saisisseur',
            'etat',
            'canal_d_appel',
            'type',
            'source'

        ];
    }

    use Exportable;

    public function __construct(string $threedaysago,string $today,string $etat,string $agence,string $secteur)
    {
        $this->today = $today;
        $this->threedaysago = $threedaysago;
        $this->etat = $etat;
        $this->agence = $agence;
        $this->secteur = $secteur;

    }

    public function query()
    {
        //return Invoice::query()->whereYear('created_at', $this->year);
        $list_com=Commande::query()->select('date_saisie','nom_saisisseur','etat','canal_d_appel','type','source')->whereBetween( 'date_saisie',[ $this->threedaysago, $this->today]);
        if($this->etat){
            $list_com = $list_com->whereIn('etat', explode(',', $this->etat));
        }
        if($this->agence){
            $list_com = $list_com->Where('agence_saisisseur',$this->agence);
        }
        if($this->secteur){
            $list_com = $list_com->Where('secteur_saisisseur',$this->secteur);
        }

        return $list_com;
    }

}