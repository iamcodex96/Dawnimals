<?php

namespace App\Exports;

//use Maatwebsite\Excel\Concerns\FromQuery;
//use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class ConverterExcel implements FromArray, WithHeadings
{
    //use Exportable;
    public $listado = [];
    public function __construct($listado, $headings)
    {
        $this->listado = $listado;
        $this->headings = $headings;

    }
    function array(): array
    {
        return $this->listado;
    }
    public function headings(): array
    {
        return $this->headings;
    }
    public static function export($query, $name)
    {
        $query = $query->get();
        if ($query->isNotEmpty()) {
            $listado = [];

            $headings = $query->first()::getHeadings();

            foreach ($query as $item) {
                array_push($listado, $item->toExcelRow());
            }

            return Excel::download(new ConverterExcel($listado, $headings), $name . '.xlsx');
        }
    }
}
