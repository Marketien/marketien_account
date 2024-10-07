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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name')->nullable();
            $table->date('date')->nullable();
            $table->string('location_name')->nullable();
            $table->string('attd')->nullable();
            $table->string('std_hour')->nullable();
            $table->string('ph')->nullable();
            $table->string('we')->nullable();
            $table->string('ot')->nullable();
            $table->string('inc')->nullable();
            $table->string('base')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('attendances');
    }
};
