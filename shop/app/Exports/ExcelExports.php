<?php

namespace App\Exports;

use App\Bill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExcelExports implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bill::all();
    }

    //thêm tên hàng tiêu đề cho bảng
    public function headings() :array {
        return ["id", "id_customer","date_order","total", "payment", "note","created_at","updated_at"];
    }
}
