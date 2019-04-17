<?php

namespace App\Classes;

interface IExportable
{
    public function toExcelRow();
    public static function getHeadings();
}
