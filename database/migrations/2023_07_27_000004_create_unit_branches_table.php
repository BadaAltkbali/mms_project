<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_branches', function (Blueprint $table) {
            $table->id();
            $table->string('unitBranch_Name')->unique();
            $table->timestamps();
        });

        DB::table('unit_branches')->insert([
            ['id' => 1, 'unitBranch_Name' => 'اختر'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_branches');
    }
};
