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
        Schema::create('input_masters', function (Blueprint $table) {
            $table->id();
            $table->string('to')->nullable();
            $table->text('address')->nullable();
            $table->string('phoneNo')->nullable();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->string('proect_name')->nullable();
            $table->string('email')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('term_pay')->nullable();
            $table->text('work_scope')->nullable();
            $table->text('projects')->nullable();
            $table->string('lpo')->nullable();
            $table->string('trn1')->nullable();
            $table->string('trn2')->nullable();
            $table->string('total_net_amount')->nullable();
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
        Schema::dropIfExists('input_masters');
    }
};
