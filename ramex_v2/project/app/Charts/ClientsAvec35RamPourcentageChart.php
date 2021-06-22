<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Models\Statistics35ram;
use Illuminate\Support\Facades\Auth;

class ClientsAvec35RamPourcentageChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $ages=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->orderBy('age', 'ASC')->get();
        $labels=array();
        $datasets=array();
        foreach($ages as $age){
            if($age->age == 1){
                $labels[] = $age->age." Semaine";
            }
            else{
                $labels[] = $age->age." Semaines";
            }
            $datasets []= $age->pourcentage;
        }
        
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Pourcentage des clients', $datasets);
    }
}