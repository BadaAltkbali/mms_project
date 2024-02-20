<?php

namespace App\Imports;

use App\Models\Emp_data;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new Emp_data([

        //     // 'name' => $row['name'],
        //     // 'email' => $row['email'],
        //     // 'password' => Hash::make($row['password']),


        //     'id' => $row['0'],
        //     'number' => $row['1'],
        //     'rank' => $row['2'],
        //     'name' => $row['3'],
        //     'nationalNo' => $row['4'],
        //     'bank' => $row['5'],
        //     'bank_no' => $row['6'],
        //     'wehda' => $row['7'],
        //     'notes' => $row['8'],

        // ]);

        return new Employee([



            // 'fileNumber' => $row['0'],
            'full_name' => $row['3'],
            'national_no' => $row['4'],
            // 'birth_d' => $row['3'],
            // 'place_birth' => $row['4'],
            // 'place_residence' => $row['5'],
            // 'closest_point' => $row['6'],
            // 'nationality' => $row['7'],
            // 'religion' => $row['8'],
            // 'blood_t' => $row['9'],
            // 'phone_n' => $row['10'],
            // 'marital_status' => $row['11'],
            // 'sons' => $row['12'],
            // 'daughter' => $row['2'],
            // 'closest_relatives' => $row['2'],
            // 'closest_relatives_Phone' => $row['2'],
            // 'passport_or_card' => $row['2'],
            // 'passport' => $row['2'],
            // 'passport_releaseDate' => $row['2'],
            // 'passport_placeOfissue' => $row['2'],
            // 'id_card' => $row['2'],
            // 'id_card_releaseDate' => $row['2'],
            // 'id_card_placeOfissue' => $row['2'],
            // 'familyHandbook_No' => $row['2'],
            // 'familyRegistration_No' => $row['2'],
            // 'familyPaper_No' => $row['2'],
            // 'familyHandbook_No___releaseDate' => $row['2'],
            // 'familyHandbook_No___placeOfissue' => $row['2'],


            'financial_Figure' => $row['1'],
            'adjective' => $row['2'],
            // 'military_number' => $row['2'],
            // 'Rank' => $row['2'],
            'bankName_id' => $row['5'],
            // 'bankBranch_id' => $row['6'],
            'bank_accountNo' => $row['6'],

            // 'unitName' => $row['2'],
            'unitBranch_id' => $row['7'],
            // 'classificationEmpContract' => $row['2'],
            // 'hiringDate' => $row['2'],
            // 'startJopDate' => $row['2'],
            // 'appointment_decision' => $row['2'],
            // 'Contract_registrationNo' => $row['2'],
            // 'lastPromotion' => $row['2'],
            // 'current_grade' => $row['2'],
            // 'current_grade_date' => $row['2'],
            // 'courses_obtained' => $row['2'],
            // 'diseases' => $row['2'],
            'notes' => $row['8'],
            'created_at' => $row['9'],
            'updated_at' => $row['10'],
            // 'vacations' => $row['2'],
            // 'medical_comfort' => $row['2'],
            // 'altasweat' => $row['2'],
            // 'placement' => $row['2'],
            // 'graduationDate' => $row['2'],
            // 'qualification' => $row['2'],
            // 'specialization' => $row['2'],
            // 'graduationPlace' => $row['2'],
            // 'workplace' => $row['2'],


        ]);
    }
}
