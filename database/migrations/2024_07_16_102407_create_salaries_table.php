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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->string('basic')->nullable();
            $table->string('holyday_ot')->nullable();
            $table->string('weekday_ot')->nullable();
            $table->string('food')->nullable();
            $table->string('other')->nullable();
            $table->string('other_due')->nullable();
            $table->string('project_bonus')->nullable();
            $table->string('salary')->nullable();
            $table->string('deduction')->nullable();
            $table->string('net_salary')->nullable();
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
        Schema::dropIfExists('salaries');
    }
};
