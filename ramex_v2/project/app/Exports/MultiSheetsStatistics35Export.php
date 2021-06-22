<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetsStatistics35Export implements WithMultipleSheets
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

            
            $sheets[0] = new StatisticsSecond35Export($this->counter2,  $this->nbr_clients, $this->pourcentage, $this->filename);
            $sheets[1] = new Statistics35Export($this->counter,$this->filename);
           
        
        return $sheets;
    }
}
