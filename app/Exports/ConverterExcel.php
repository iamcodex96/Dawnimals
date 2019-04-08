<?php

namespace App\Exports;

use App\Models\Donante;
//use Maatwebsite\Excel\Concerns\FromQuery;
//use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class ConverterExcel implements FromCollection,WithHeadings
{
    //use Exportable;
    public $listado = [];
    public function __construct($listado,$headings)
    {
        $this->listado = $listado;
        $this->headings = $headings;

    }
    public function collection(){
        return $this->listado;
    }
    public function headings():array{
        return $this->headings;
    }
    public static function export($listado,$headings,$name){
        return Excel::download(new ConverterExcel($listado, $headings), $name.'.xlsx');
    }
}

?>
