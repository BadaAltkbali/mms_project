<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_officers', function (Blueprint $table) {
            $table->id();
            $table->string('fileNumber')->unique()->nullable();
            $table->string('full_name')->unique();
            $table->string('national_no')->unique()->nullable();
            $table->string('birth_d')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('place_residence')->nullable();
            $table->string('closest_point')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_t')->nullable();
            $table->string('phone_n')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('sons')->nullable();
            $table->integer('daughter')->nullable();
            $table->string('closest_relatives')->nullable();
            $table->string('closest_relatives_Phone')->nullable();
            $table->string('passport_or_card')->nullable();
            $table->string('passport')->nullable();
            $table->string('passport_releaseDate')->nullable();
            $table->string('passport_placeOfissue')->nullable();
            $table->string('id_card')->nullable();
            $table->string('id_card_releaseDate')->nullable();
            $table->string('id_card_placeOfissue')->nullable();
            $table->string('familyHandbook_No')->nullable();
            $table->string('familyRegistration_No')->nullable();
            $table->string('familyPaper_No')->nullable();
            $table->string('familyHandbook_No___releaseDate')->nullable();
            $table->string('familyHandbook_No___placeOfissue')->nullable();

            // $table->string('financial_Figure')->unique();
            // $table->string('adjective')->nullable();
            $table->string('military_number')->unique()->nullable();
            $table->string('Rank')->nullable();
            $table->string('bankName_id')->nullable();
            $table->string('bankBranch_id')->nullable();
            $table->string('bank_accountNo')->unique()->nullable();

            $table->string('unitName')->nullable();
            $table->string('unitBranch_id')->nullable();
            $table->string('classificationEmpContract')->nullable();
            $table->string('hiringDate')->nullable();
            $table->string('startJopDate')->nullable();
            $table->string('appointment_decision')->nullable();
            $table->string('Contract_registrationNo')->nullable();
            $table->string('lastPromotion')->nullable();
            $table->string('current_grade')->nullable();
            $table->string('current_grade_date')->nullable();
            $table->string('courses_obtained')->nullable();
            $table->string('diseases')->nullable();
            $table->string('notes')->nullable();
            $table->string('vacations')->nullable();
            $table->string('medical_comfort')->nullable();
            $table->string('altasweat')->nullable();
            $table->string('placement')->nullable();
            $table->string('graduationDate')->nullable();
            $table->string('qualification')->nullable();
            $table->string('specialization')->nullable();
            $table->string('graduationPlace')->nullable();
            $table->string('workplace')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_officers');
    }
};
