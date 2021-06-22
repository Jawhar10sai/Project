<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use Maatwebsite\Excel\Concerns\FromCollection;

class MultiSheetsStatistics0Export implements WithMultipleSheets
{
    use Exportable;

    
    public function __construct(int $counter,int $counter2,int $nbr_clients,float $pourcentage, string $filename)
    {
        $this->counter = $counter;
        $this->counter2 = $counter2;
        $this->nbr_clients = $nbr_clients;
        $this->pourcentage = $pourcentage;
        $this->filename = $filename;

    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

            
            $sheets[0] = new StatisticsSecond0Export($this->counter2,  $this->nbr_clients, $this->pourcentage, $this->filename);
            $sheets[1] = new StatisticsExport($this->counter,$this->filename);
           
        
        return $sheets;
    }
}
