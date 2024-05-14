<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Employee;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EmployeeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::select('full_name','national_no','financial_Figure')->get();
    }
    public function headings(): array
    {
        return [
            'full_name',
            'national_no',
            'financial_Figure',
        ];
    }

    // public function collection()
    // {
    //     return Employee::all();
    // }
}




// 3. Export Data to Excel Sheet from a "Blade View" using "FormView" concern 


// <?php

// namespace App\Exports;

// use App\Models\Customer;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;

// class CustomersExport implements FromView
// {
//     public function view(): View
//     {
//         return view('customer.export', [
//             'customers' => Customer::all()
//         ]);
//     }
// }