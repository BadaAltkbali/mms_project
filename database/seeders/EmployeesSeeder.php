<?php

namespace Database\Seeders;

use App\Models\Emp_data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{

    public function run()
    {
        Emp_data::truncate();
        $csvData = fopen(base_path('database/csv/mmsDB.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Emp_data::create([
                    'id' => $data['0'],
                    'number' => $data['1'],
                    'rank' => $data['2'],
                    'name' => $data['3'],
                    'nationalNo' => $data['4'],
                    'bank' => $data['5'],
                    'bank_no' => $data['6'],
                    'wehda' => $data['7'],
                    'notes' => $data['8'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
