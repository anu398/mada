<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropertyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $fields;

    function __construct($fields = []) {
        $this->fields = $fields;
    }
    public function collection()
    {
        if(count($this->fields) > 0) {
            return Property::select($this->fields)->get();
        }
        else {
            return Property::select('name','project_name','price','commission_amount','commission_percentage')->get();
        }
    }

    public function headings(): array
    {
        if(count($this->fields) > 0) {
            $headings =  $this->fields;
        }
        else {
            $headings = [
                'name',
                'project_name',
                'price',
                'commission_amount',
                'commission_percentage'
            ];
        }

        return $headings;

    }
}
