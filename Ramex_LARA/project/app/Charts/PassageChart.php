<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Models\Passage;
use Illuminate\Support\Facades\Auth;

class PassageChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        //$counter=Passage::where('nom_utilisateur',Auth::user()->name)->count();

        $counter2=Passage::where('nom_utilisateur',Auth::user()->name)->where('cat_0',1)->count();
       // $counter2=number_format((float)$counter2,2,'.','');

        $counter3=Passage::where('nom_utilisateur',Auth::user()->name)->where('cat_12',1)->count();
        //$counter3=number_format((float)$counter3,2,'.','');

        $counter4=Passage::where('nom_utilisateur',Auth::user()->name)->where('cat_35',1)->count();
       // $counter4=number_format((float)$counter4,2,'.','');


        return Chartisan::build()
            ->labels(['Catégorie 0 ramasse', 'Catégorie 1*2 ramasses', 'Catégorie 3*5 ramasses'])
            ->dataset('Nombre des clients dans chaque catégorie', [$counter2, $counter3, $counter4]);
            
    }
}