<?php

namespace App\Exports;

use App\Models\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class LogsExport implements FromCollection, WithHeadings
{
  
    public function headings():array{
        return [
            'id',
            'description',
            'severity'
        ];
    }


    public function collection()
    {
        return collect(Log::getLogs());
    }
}
