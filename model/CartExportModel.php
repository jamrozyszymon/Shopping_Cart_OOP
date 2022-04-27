<?php

namespace model;

class CartExportModel
{
    //Prepare to export - convert usign JSON, array of objects to array of arrays
    public function convertArray()
    {
        $arrayArrays=json_decode((json_encode($this->cart->products)), true);
        return $arrayArrays;
    }

    //Export to .csv
    public function exportCsv()
    {
        $result =[];
        $export=fopen('export/export.csv','w');
        //Export header
        fputcsv($export, array('Id', 'Nazwa', 'Kod', 'Cena', 'Ilosc'));
        //Export value
        foreach ($this->convertArray() as $row) {
            $result = [];
            array_walk_recursive($row, function($item) use (&$result) {
                $result[] = $item;
            });
            fputcsv($export, $result);
        }
        return $result;
    fclose($export);
    }

    //Export to .txt
    public function exportTxt()
    {
        $fp = fopen('export/export.txt', 'w');
        //Export header
        $header= 'Id Nazwa Kod Cena Ilosc'.PHP_EOL;
        fwrite($fp, $header);
        //Export value
        foreach ($this->convertArray() as $row) {
            $result = [];
            array_walk_recursive($row, function($item) use (&$result) {
                $result[] = $item;
            });
            $string=implode(' ',$result).PHP_EOL;
            fwrite($fp, $string);
        }
        fclose($fp);
    }
}

