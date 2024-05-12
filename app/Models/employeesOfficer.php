<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeesOfficer extends Model
{
    use HasFactory;
    protected $fillable = [
        'fileNumber',
        'full_name',
        'national_no',
        'birth_d',
        'place_birth',
        'place_residence',
        'closest_point',
        'nationality',
        'religion',
        'blood_t',
        'phone_n',
        'marital_status',
        'sons',
        'daughter',
        'closest_relatives',
        'closest_relatives_Phone',
        'passport_or_card',
        'passport',
        // 'passport_releaseDate',
        'passport_placeOfissue',
        'id_card',
        'id_card_releaseDate',
        'id_card_placeOfissue',
        'familyHandbook_No',
        'familyRegistration_No',
        'familyPaper_No',
        'familyHandbook_No___releaseDate',
        'familyHandbook_No___placeOfissue',


        // 'financial_Figure',
        // 'adjective',
        'military_number',
        'Rank',
        'bankName_id',
        'bankBranch_id',
        'bank_accountNo',

        'unitName',
        'unitBranch_id',
        'classificationEmpContract',
        'hiringDate',
        'startJopDate',
        'appointment_decision',
        'Contract_registrationNo',
        'lastPromotion',
        'current_grade',
        'current_grade_date',
        'courses_obtained',
        'diseases',
        'notes',
        'vacations',
        'medical_comfort',
        'altasweat',
        'placement',
        'graduationDate',
        'qualification',
        'specialization',
        'graduationPlace',
        'workplace',
    ];
}