<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Models\Commande;
//Carbon is a laravel api used to extract datetime 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class RamassageChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $mois = array ('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        $now = Carbon::now();
        if (($now->month) == 1){
            $first=0;
            $second=11;
            $third=10;
        }
        elseif  (($now->month) == 2){
            $first=1;
            $second=0;
            $third=11;
        }
        else {
            $first = $now->month - 1;
            $second = $now->month - 2;
            $third = $now->month - 3;
        }

        $demandes_lm=Commande::where('agence_saisisseur',Auth::user()->agence)->whereMonth('created_at', '=', $first+1 )->count();
        $demandes_lsm=Commande::where('agence_saisisseur',Auth::user()->agence)->whereMonth('created_at', '=', $second+1 )->count();
        $demandes_ltm=Commande::where('agence_saisisseur',Auth::user()->agence)->whereMonth('created_at', '=', $third+1 )->count();

        $demandes_annulees_lm=Commande::where('agence_saisisseur',Auth::user()->agence)->whereMonth('created_at', '=', $first+1 )->where('etat','Annulées')->count();
        $demandes_annulees_lsm=Commande::where('agence_saisisseur',Auth::user()->agence)->whereMonth('created_at', '=', $second+1 )->where('etat','Annulées')->count();
        $demandes_annulees_ltm=Commande::where('agence_saisisseur',Auth::user()->agence)->whereMonth('created_at', '=', $third+1 )->where('etat','Annulées')->count();


        return Chartisan::build()
            ->labels([$mois [$first], $mois [$second] , $mois [$third]])
            ->dataset('Demandes de ramassage', [$demandes_lm, $demandes_lsm, $demandes_ltm])
            ->dataset('Demandes annulées', [ $demandes_annulees_lm,  $demandes_annulees_lsm,  $demandes_annulees_ltm]);
    }
}