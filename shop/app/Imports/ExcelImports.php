<?php

namespace App\Imports;

use App\Bill;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ExcelImports implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function headingRow() : int
    {
        return 1;
    }
    public function model(array $row)
    {

        return new Bill([
            'id'=> $row['id'],
            'id_customer'=>$row['id_customer'],
            'date_order'=>$row['date_order'],
            'total'=>$row['total'],
            'payment'=>$row['payment'],
            'note'=>$row['note'],
            'created_at'=>$row['created_at'],
            'updated_at'=>$row['updated_at'],
        ]);
    }
}
