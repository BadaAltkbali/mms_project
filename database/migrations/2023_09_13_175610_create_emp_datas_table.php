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
        Schema::create('emp_datas', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('rank')->nullable();
            $table->string('name')->nullable();
            $table->string('nationalNo')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_no')->nullable();
            $table->string('wehda')->nullable();
            $table->string('notes')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_datas');
    }
};
