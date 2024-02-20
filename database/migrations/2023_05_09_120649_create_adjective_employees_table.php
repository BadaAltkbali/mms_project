<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('adjective_employees', function (Blueprint $table) {
            $table->id();
            $table->string('AdjName')->unique();
            $table->timestamps();
        });

        DB::table('adjective_employees')->insert([
            ['id' => 1, 'AdjName' => 'اختر'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjective_employees');
    }
};
