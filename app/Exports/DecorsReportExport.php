<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DecorsReportExport implements FromCollection, WithHeadings
{
    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return collect($this->items->map(function ($item) {
            return [
                'name' => $item->name,
                'qty' => $item->qty,
                'reserved' => $item->reserved,
                'remaining' => $item->remaining,
            ];
        }));
    }

    public function headings(): array
    {
        return [
            'اسم الصنف',
            'الرصيد',
            'المحجوز منه',
            'المتاح',
        ];
    }
}
